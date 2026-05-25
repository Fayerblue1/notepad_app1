<?php

namespace App\Livewire\Admin;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function deleteNote($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        // Kirim notifikasi flash message sukses ke halaman
        session()->flash('message', 'Catatan berhasil dihapus oleh Admin.');
    }
    public function render()
    {
        $notes = Note::with('user')->latest()->paginate(10);

        return view('livewire.admin.dashboard', [
            'notes' => $notes
        ])->layout('layouts.app'); // Menggunakan file layout utama aplikasi
    }
}
