<?php

namespace App\Livewire\Guest;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Landingpage extends Component
{
    // Menggunakan Livewire v3 Validation Attributes untuk form tambah catatan
    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('required|min:5')]
    public $content = '';

    /**
     * Fungsi untuk menyimpan catatan baru ke database
     */
    public function saveNote()
    {
        // 1. Jalankan validasi input
        $this->validate();

        // 2. Simpan ke database terhubung dengan ID user yang sedang login
        Note::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
        ]);

        // 3. Reset kolom input di form setelah sukses menyimpan
        $this->reset(['title', 'content']);

        // 4. Kirim flash message sukses
        session()->flash('message', 'Catatan baru berhasil ditambahkan!');
    }

    /**
     * Fungsi untuk menghapus catatan milik sendiri
     */
    public function deleteNote($id)
    {
        // Memastikan catatan yang dihapus benar-benar milik user yang sedang login (keamanan ekstra)
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        $note->delete();

        session()->flash('message', 'Catatan berhasil dihapus.');
    }

    public function render()
    {
        // Mengambil catatan khusus milik user yang sedang aktif login saja
        $myNotes = [];
        
        if (Auth::check()) {
            $myNotes = Note::where('user_id', Auth::id())->latest()->get();
        }

        return view('livewire.guest.landingpage', [
            'myNotes' => $myNotes
        ])->layout('layouts.app'); // Pastikan menggunakan layout utama aplikasi
    }
}