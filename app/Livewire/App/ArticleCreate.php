<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Artikel')]
#[Layout('layouts.app')]

class ArticleCreate extends Component
{
    public function render()
    {
        return view('livewire.app.article-create');
    }
}
