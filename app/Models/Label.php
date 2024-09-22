<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    const LABEL_NAME = [
        'super-admin' => 'Super Admin',
        'admin' => 'Admin ',
        'user' => 'Anggota ',
        'guest' => 'User Coder',
        'alumni' => 'Alumni'
    ];
}
