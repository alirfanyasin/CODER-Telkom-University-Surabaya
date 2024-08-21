<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Artikel')]
#[Layout('layouts.app')]

class Article extends Component
{
    public $slug = null;

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        if ($this->slug) {
            return view('livewire.app.article-detail', ['slug' => $this->slug]);
        } else {
            return view('livewire.app.article');
        }
    }
}
