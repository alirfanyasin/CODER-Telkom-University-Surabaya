<?php

namespace App\Livewire\Auth;

use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Register')]
#[layout('layouts.auth')]

class Register extends Component
{
    #[Validate('required', message: 'Nama Lengkap wajib di isi', translate: true)]
    public $name;

    #[Validate('required', message: 'Email wajib di isi', translate: true)]
    public $email;

    #[Validate('required', message: 'Password wajib di isi', translate: true)]
    #[Validate('min:6', message: 'Password minimal 6 karakter', translate: true)]
    public $password;

    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'label' => Label::LABEL_NAME['guest']
        ]);
        $user->assignRole('guest');
        $this->redirect('/login');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
