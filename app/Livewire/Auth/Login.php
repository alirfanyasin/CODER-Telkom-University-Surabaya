<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
#[Layout('layouts.auth')]

class Login extends Component
{
    #[Validate('required', message: 'Email wajib di isi', translate: true)]
    public $email;

    #[Validate('required', message: 'Password wajib di isi', translate: true)]
    #[Validate('min:6', message: 'Password minimal 6 karakter', translate: true)]
    public $password;

    public function login()
    {
        // $this->validate();
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            if (Auth::user()->hasRole('super-admin')) {
                return redirect()->intended('app/');
            }
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('app/');
            }
            if (Auth::user()->hasRole('user')) {
                return redirect()->intended('app/');
            }
            if (Auth::user()->hasRole('guest')) {
                return redirect()->intended('app/');
            }
        } else {
            $this->reset('password');
            dd('Email atau Password Salah');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
