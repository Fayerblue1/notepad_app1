<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Daftarkan kolom database yang boleh diisi lewat form Notepad
#[Fillable(['user_id', 'title', 'content'])]
class Note extends Model
{
    /**
     * Relasi balik ke User (Satu catatan dimiliki oleh satu User)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}