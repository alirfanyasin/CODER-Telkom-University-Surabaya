<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

#[Title('Login')]
#[Layout('layouts.auth')]

class Login extends Component
{
    use LivewireAlert, WithRateLimiting;

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function messages()
    {
        return [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ];
    }

    public function login()
    {
        // $this->validate();

        try {
            $this->rateLimit(3);

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
                $this->alert('error', 'Email atau Password Salah!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
            }
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'email' => "Silahkan tunggu {$exception->secondsUntilAvailable} detik lagi untuk login kembali",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
