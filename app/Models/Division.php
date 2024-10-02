<?php

namespace App\Models;

use App\Models\ELeaning\Modul;
use App\Models\Elearning\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    /**
     * Get all of the user for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'division_id');
    }

    /**
     * Get all of the moduls for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modul(): HasMany
    {
        return $this->hasMany(Modul::class, 'division_id');
    }

    /**
     * Get all of the report for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report(): HasMany
    {
        return $this->hasMany(Report::class, 'division_id');
    }

    /**
     * Get all of the task for the Division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task(): HasMany
    {
        return $this->hasMany(Task::class, 'division_id');
    }
}
