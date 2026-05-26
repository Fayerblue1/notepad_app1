<?php

use App\Livewire\Guest\Landingpage;
use Illuminate\Support\Facades\Route;

Route::get('/', Landingpage::class)->name('home');
