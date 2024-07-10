<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Artikel')]
#[Layout('layouts.guest')]

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
            return view('livewire.pages.article.detail', ['slug' => $this->slug]);
        } else {
            return view('livewire.pages.article.index');
        }
    }
}
