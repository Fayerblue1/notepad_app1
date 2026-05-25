<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{
    // Menggunakan Livewire v3 Form Validation Attributes
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|email|max:255|unique:users')]
    public $email = '';

    #[Validate('required|string|min:8|confirmed')]
    public $password = '';

    // Untuk konfirmasi password (wajib sama dengan $password karena ada aturan 'confirmed')
    public $password_confirmation = ''; 

    // Properti untuk menentukan role saat registrasi (default-nya 'guest')
    public $role = 'guest';

    /**
     * Fungsi untuk memproses pendaftaran akun baru
     */
    public function register()
    {
        // 1. Jalankan validasi input sesuai dengan rule di atas
        $this->validate();

        // 2. Simpan data user baru ke database
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // Password di-hash demi keamanan
            'role' => $this->role,
        ]);

        // 3. Otomatis login setelah berhasil register
        Auth::login($user);

        // Regenerasi session setelah login sukses
        session()->regenerate();

        // 4. LOGIC REDIRECT: Cek role untuk menentukan halaman tujuan
        if ($user->role === 'admin') {
            return $this->redirectRoute('admin.dashboard', navigate: true);
        }

        return $this->redirectRoute('guest.landing', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }
}