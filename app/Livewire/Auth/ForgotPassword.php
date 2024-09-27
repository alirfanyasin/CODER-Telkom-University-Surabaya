<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Lupa Kata Sandi')]
#[Layout('layouts.auth')]


class ForgotPassword extends Component
{
    use LivewireAlert;

    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function messages()
    {
        return [
            'email.required' => 'Email wajib di isi!',
            'email.email' => 'Anda memasukkan bukan email',
        ];
    }


    public function forgotPassword()
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->alert('success', 'Berhasil mengirim email', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);

            return back()->with(['status' => __($status)]);
        } else {
            $this->alert('error', "User tidak ditemukan", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);

            return back()->withErrors(['email' => __($status)]);
        }

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['status' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
