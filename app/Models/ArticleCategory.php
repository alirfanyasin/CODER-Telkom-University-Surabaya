<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    const CATEGORY_NAME = [
        "Dojo Event",
        "Playbox Event",
        "Waow Event",
        "Berita Coder",
        "Teknologi",
        "Edukasi",
        "Keamanan Cyber",
        "Mahasiswa Berprestasi",
    ];

    protected $guarded = ['id'];
}
