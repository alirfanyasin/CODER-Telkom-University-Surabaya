<?php

namespace App\Livewire\Pages;

use App\Models\Division;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
#[Layout('layouts.guest')]

class Home extends Component
{
    public $dataDeveloperTeam;


    public function mount()
    {
        $this->developerTeam();
    }

    protected function developerTeam()
    {
        $this->dataDeveloperTeam = [
            [
                'name' => 'Deo Farady Santoso',
                'image' => 'deo.png',
                'role' => 'UI / UX Designer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Dandy Maulana A. Y',
                'image' => 'dandy.png',
                'role' => 'Full-stack Developer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Irfan Yasin',
                'image' => 'irfan.png',
                'role' => 'Full-stack Developer',
                'whatsapp' => '087859967039',
                'github' => 'alirfanyasin',
                'linkedin' => 'alirfanyasin',
            ],
            [
                'name' => 'Fakhri Alauddin',
                'image' => 'fakhri.png',
                'role' => 'Front-end Developer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Moch. Rama Maulana',
                'image' => 'rama.png',
                'role' => 'Front-end Developer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Ananda Bintang',
                'image' => 'bintang.png',
                'role' => 'Back-end Developer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Raihan Siyun',
                'image' => 'siyun.png',
                'role' => 'Back-end Developer',
                'whatsapp' => '',
                'github' => '',
                'linkedin' => '',
            ],
        ];;
    }


    public function render()
    {
        return view('livewire.pages.home', [
            'allDivision' => Division::all(),
            'dataDeveloperTeam' => $this->dataDeveloperTeam
        ]);
    }
}
