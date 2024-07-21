<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    const DIVISION_NAMES = [
        "Web Development",
        "UI/UX Design",
        "AI Software",
        "Mobile Development",
        "Competitive Programming",
        "Data Engineering"
    ];
    const DESCRIPTIONS = [
        'Belajar dan mengembangan aplikasi berbasis Website yang modern',
        'Melakukan proses Sketching, Wireframing, Mockup, hingga Prototype',
        'Mengembangkan perangkat lunak berbasis kecerdasan artifisial',
        'Melakukan pengembangan aplikasi berbasis Mobile Application',
        'Melakukan pengembangan algoritma pemrograman untuk berkompetisi',
        'Melakukan pengolahan data untuk dianalisa dan memperoleh manfaat'
    ];
    const ICONS = [
        'quill:desktop',
        'mingcute:pen-line',
        'mage:robot',
        'nimbus:mobile',
        'ph:code-bold',
        'ant-design:pie-chart-outlined'
    ];

    protected $guarded = ['id'];
}
