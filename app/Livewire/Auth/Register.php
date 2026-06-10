<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email|max:255|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8|confirmed')]
    public string $password = '';

    // Tambahkan properti ini untuk validasi 'confirmed'
    public string $password_confirmation = ''; 

    public function register()
    {
        $validated = $this->validate();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        session()->regenerate();

        // Redirect ke dashboard karena user sudah berhasil login
        return redirect()->route('dashboard'); 
    }


    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.app');
    }
}