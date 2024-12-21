<?php

namespace App\Livewire\Auth;

use App\Models\UserActive;
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
            $this->rateLimit(3, 60, $this->email);

            $credentials = $this->validate();

            if (Auth::attempt($credentials)) {
                session()->regenerate();

                $dataUser = UserActive::where('user_id', Auth::user()->id)->first();

                if ($dataUser) {
                    $dataUser->update(['status' => 'active']);
                } else {
                    UserActive::create([
                        'user_id' => Auth::user()->id,
                        'status' => 'active'
                    ]);
                }


                if (Auth::user()->hasRole('super-admin')) {
                    $this->alert('success', 'Berhasil Login', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'timerProgressBar' => true,
                    ]);
                    return redirect()->intended('app/');
                }
                if (Auth::user()->hasRole('admin')) {
                    $this->alert('success', 'Berhasil Login', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'timerProgressBar' => true,
                    ]);
                    return redirect()->intended('app/');
                }
                if (Auth::user()->hasRole('user')) {
                    $this->alert('success', 'Berhasil Login', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'timerProgressBar' => true,
                    ]);
                    return redirect()->intended('app/');
                }
                if (Auth::user()->hasRole('guest')) {
                    $this->alert('success', 'Berhasil Login', [
                        'position' => 'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'timerProgressBar' => true,
                    ]);
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
