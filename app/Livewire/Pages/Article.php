<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Article')]
#[Layout('layouts.guest')]

class Article extends Component
{
  // article index
    public function render()
    {
        return view('livewire.pages.article.index');
    }

    // article detail
    public function detail($slug)
    {
        return view('livewire.pages.article.detail', ['slug' => $slug]);
    }
}