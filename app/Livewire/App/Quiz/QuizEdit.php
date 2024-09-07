<?php

namespace App\Livewire\App\Quiz;

use App\Models\Quiz\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Kuis')]
#[Layout('layouts.app')]

class QuizEdit extends Component
{
    use LivewireAlert;

    #[Validate('required', message: "Judul wajib diisi")]
    public $title;
    #[Validate('required', message: "Thumbnail wajib diisi")]
    public $thumbnail;
    public $status;
    public $id;

    public function mount($id)
    {
        $this->id = $id;

        $data = Quiz::find($id);
        $this->title = $data->title;
        $this->status = $data->status;
        $this->thumbnail = $data->thumbnail;
    }

    public function update($id)
    {
        $this->validate();

        $data = Quiz::findOrFail($id);

        $data->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,

        ]);

        $this->alert('success', 'Berhasil Ubah Data', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
        return redirect()->route('app.e-learning.quiz');
    }


    public function render()
    {
        $data = Quiz::find($this->id);
        return view('livewire.app.quiz.quiz-edit', [
            'data' => $data
        ]);
    }
}
