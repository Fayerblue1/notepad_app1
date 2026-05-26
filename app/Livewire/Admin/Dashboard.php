<?php

namespace App\Livewire\Admin;

use App\Models\Note;
use App\Models\User; // Tambahkan ini untuk hitung total user
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url; // Menjaga keyword search tetap ada di URL browser

class Dashboard extends Component
{
    use WithPagination;

    // Properti untuk menampung input pencarian (otomatis sinkron dengan form)
    #[Url(history: true)]
    public $search = '';

    // Reset halaman pagination ke nomor 1 secara otomatis jika user mengetik sesuatu di kolom search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Fungsi untuk menghapus catatan
     */
    public function deleteNote($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        session()->flash('message', 'Catatan berhasil dihapus oleh Admin.');
    }

    public function render()
    {
        // 1. Ambil data statistik singkat untuk dipajang di atas dashboard
        $totalNotes = Note::count();
        $totalUsers = User::count();

        // 2. Ambil data notes yang sudah difilter berdasarkan pencarian judul atau konten
        $notes = Note::with('user')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
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