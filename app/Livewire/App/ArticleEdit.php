<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Perbarui Artikel')]
#[Layout('layouts.app')]

class ArticleEdit extends Component
{
    public function render()
    {
        return view('livewire.app.article-edit');
    }
}
