<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    // Menggunakan Livewire v3 Form Validation Attributes
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false;

    /**
     * Fungsi untuk memproses login
     */
    public function login()
    {
        // 1. Jalankan validasi inputan di atas
        $this->validate();

        // 2. Coba lakukan autentikasi (attempt login)
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            
            // Regenerasi session untuk keamanan dari session fixation
            session()->regenerate();

            // 3. Ambil data user yang baru saja berhasil login
            $user = Auth::user();

            // 4. LOGIC REDIRECT: Cek role user untuk pengalihan halaman
            if ($user->role === 'admin') {
                // Jika admin, arahkan ke route dashboard admin
                return $this->redirectRoute('admin.dashboard', navigate: true);
            }

            // Jika bukan admin (guest/user biasa), arahkan ke halaman utama
            return $this->redirectRoute('guest.landing', navigate: true);
        }

        // 5. Jika login gagal, kirim pesan error ke inputan email
        $this->addError('email', 'Email atau password yang kamu masukkan salah.');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}