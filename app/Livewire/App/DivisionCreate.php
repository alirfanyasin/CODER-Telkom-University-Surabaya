<?php

namespace App\Livewire\App;

use App\Models\Division;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Buat Divisi')]
#[Layout('layouts.app')]

class DivisionCreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $name;
    public $description;
    public $image;
    public $slug;

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
        'image' => 'required|Image',
        'slug' => 'required|unique:divisions,slug'
    ];

    public function messages()
    {
        return [
            'slug.unique' => 'The name has already been taken.'
        ];
    }

    public function save(){
        $this->slug = $this->makeSlug($this->name);
        $this->validate();
        try {
            $filename = $this->slug. '.' . $this->image->extension();
            Division::create([
                "slug" => $this->slug,
                "name" => $this->name,
                "description" => $this->description,
                "logo" => $filename
            ]);
            $this->image->storeAs('file/division', $filename, 'public');
            return redirect()->to("/app/division");
        } catch (\Throwable $th) {
            $this->alert('error', "Divison gagal ditambahkan", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
        }
    }

    private function makeSlug($name) {
        $slug = trim(strtolower($name));
        $slug = preg_replace('/[\s_]+/', '-', $slug);
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
        return $slug;
    }

    public function render()
    {
        return view('livewire.app.division-create');
    }
}
