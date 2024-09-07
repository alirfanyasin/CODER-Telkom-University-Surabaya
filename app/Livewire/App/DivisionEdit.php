<?php

namespace App\Livewire\App;

use App\Models\Division;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Divisi')]
#[Layout('layouts.app')]

class DivisionEdit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public Division $division;
    public $name;
    public $description;
    public $image;
    public $tmpImage;
    public $slug;

    public function mount($slug){
        $this->division = Division::where("slug", $slug)->first();
        $this->name = $this->division->name;
        $this->slug = $this->division->slug;
        $this->tmpImage = $this->division->logo;
        $this->description = $this->division->description;
    }

    public function rules(){
        return [
            'name' => 'required|min:6',
            'description' => 'required',
            'image' => 'nullable|Image',
            'slug' => ["required", Rule::unique('divisions', 'slug')->ignore($this->division->id)]
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'The name has already been taken.'
        ];
    }
    public function save(){
        $this->slug = $this->makeSlug($this->name);
        $this->validate();
        $data = [
            "description" => $this->description,
            "name" => $this->name
        ];
        if ($this->slug != $this->division->slug) {
            $data["slug"] = $this->slug;
        }
        if ($this->image) {
            $filename = $this->slug . '.' . $this->image->extension();
            $data['logo'] = $filename;
            if ($this->division->logo) {
                Storage::disk('public')->delete('file/division/' . $this->division->logo);
            }
            $this->image->storeAs('file/division', $filename, 'public');
        }
        try {
            $this->division->update($data);
            return redirect()->to("/app/division");
        } catch (\Throwable $th) {
            $this->alert('error', "Divison gagal diubah", [
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
        return view('livewire.app.division-edit');
    }
}
