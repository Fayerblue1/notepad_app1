<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $remember = false;

    public function login()
    {
        // 1. Jalankan validasi input
        $this->validate();

        // 2. Coba lakukan autentikasi
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            
            // Regenerasi session untuk keamanan mencegah session fixation
            session()->regenerate();

            // 3. Redirect ke halaman dashboard (sesuai route 'dashboard' yang sudah dibuat)
            // Menggunakan navigate: true agar perpindahan halaman terasa cepat seperti SPA (Single Page Application)
            return $this->redirectRoute('dashboard', navigate: true);
        }

        // 4. Jika login gagal
        $this->addError('email', 'Email atau password yang kamu masukkan salah.');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}