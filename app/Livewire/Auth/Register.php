<?php

namespace App\Livewire\Auth;

use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Register')]
#[layout('layouts.auth')]

class Register extends Component
{
    use LivewireAlert;

    #[Validate('required', message: 'Nama Lengkap wajib di isi', translate: true)]
    #[Validate('min:3', message: 'Nama Lengkap minimal 3 karakter', translate: true)]
    #[Validate('max:50', message: 'Nama Lengkap maksimal 50 karakter', translate: true)]
    #[Validate('regex:/^[a-zA-Z\s]+$/', message: 'Tidak boleh mengandung spesial karakter', translate: true)]
    public $name;

    #[Validate('required', message: 'Email wajib di isi', translate: true)]
    #[Validate('unique:users,email', message: 'Email sudah terdaftar', translate: true)]
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
        $this->alert('success', 'Berhasil Registrasi', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->redirect('/login');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
