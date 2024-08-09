<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Profil')]
#[Layout('layouts.app')]

class ProfileEdit extends Component
{
    use LivewireAlert;

    public $userId;
    public $name;
    public $email;
    public $password;
    public $major;
    public $nim;
    public $batch;
    public $phone_number;
    public $avatar;
    public $github;
    public $identity_code;
    public $division_id;
    public $tag;

    public function mount()
    {
        $this->userId = Auth::user()->id;

        $user = User::findOrFail($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->major = $user->major;
        $this->nim = $user->nim;
        $this->batch = $user->batch;
        $this->phone_number = $user->phone_number;
        $this->avatar = $user->avatar;
        $this->github = $user->github;
        $this->identity_code = $user->identity_code;
        $this->division_id = $user->division_id;
        $this->tag = $user->tag;
    }

    public function updateProfile()
    {
        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;

        // if ($this->password) {
        //     $user->password = Hash::make($this->password);
        // }

        $user->major = $this->major;
        $user->nim = $this->nim;
        $user->batch = $this->batch;
        $user->phone_number = $this->phone_number;
        $user->avatar = $this->avatar;
        $user->github = $this->github;
        $user->identity_code = $this->identity_code;
        $user->division_id = $this->division_id;
        if ($this->tag == 'Empty') {
            $user->tag = NULL;
        } else {
            $user->tag = $this->tag;
        }

        $user->save();

        $this->alert('success', 'Profile updated successfully', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.app.profile-edit');
    }
}
