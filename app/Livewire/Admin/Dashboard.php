<?php

namespace App\Livewire\Admin;

use App\Models\Note;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use WithPagination;

    // Remove Url attribute to avoid attribute argument issues
    public $search = '';

    // Properti untuk editor catatan
    public $noteId = null;
    public $title = '';
    public $content = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Mengosongkan form untuk membuat catatan baru
    public function createNote()
    {
        $this->reset(['noteId', 'title', 'content']);
    }

    // Memuat data catatan yang diklik ke dalam form editor
    public function loadNote($id)
    {
        $note = Note::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $this->noteId = $note->id;
        $this->title = $note->title;
        $this->content = $note->content;
    }

    // Menyimpan catatan baru atau mengupdate catatan lama
    public function saveNote()
    {
        $this->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        $title = trim($this->title);

        if ($title === '') {
            $title = 'Untitled Note';
        }

        $note = Note::updateOrCreate(
            [
                'id' => $this->noteId,
                'user_id' => auth()->id(),
            ],
            [
                'title' => $this->title,
                'content' => $this->content,
            ]
        );


        $this->noteId = $note->id;

        session()->flash('message', 'Catatan berhasil disimpan.');

        // Opsional: kosongkan form setelah disave
        // $this->createNote(); 
    }

    public function updatedContent()
    {
        if ($this->noteId) {
            $this->saveNote();
        }
    }

    public function deleteNote($id)
    {
        $note = Note::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $note->delete();
        $this->resetPage();

        // Jika catatan yang dihapus sedang dibuka di editor, kosongkan editor
        if ($this->noteId === $id) {
            $this->createNote();
        }

        session()->flash('message', 'Catatan berhasil dihapus.');
    }

    // Fungsi Logout
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        // Use Auth::id() to avoid calling id() on a null auth() helper
        $totalNotes = Note::where('user_id', Auth::id())->count();
        $totalUsers = User::count();

        $notes = Note::where('user_id', Auth::id())
            ->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('content', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.dashboard', [
            'notes' => $notes,
            'totalNotes' => $totalNotes,
            'totalUsers' => $totalUsers,
        ])->layout('layouts.app');
    }
}
