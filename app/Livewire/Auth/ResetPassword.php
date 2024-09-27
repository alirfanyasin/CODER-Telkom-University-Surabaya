<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reset Kata Sandi')]
#[Layout('layouts.auth')]


class ResetPassword extends Component
{
    use LivewireAlert;

    public $email;
    public $password;
    public $password_confirmation;
    public $token;
    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->email;
    }


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
        'token' => 'required',
    ];

    public function messages()
    {
        return [
            'token.required' => 'Token tidak valid',
            'email.required' => 'Email wajib di isi!',
            'email.email' => 'Anda memasukkan bukan email yang valid',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
        ];
    }


    public function resetPassword()
    {
        $this->validate(); // Validasi input

        // Reset password
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            // Menampilkan pesan sukses dan redirect ke login
            $this->alert('success', 'Password berhasil diperbarui!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);

            return redirect()->route('login')->with('status', __($status));
        } else {
            // Menampilkan pesan error
            $this->alert('error', 'Gagal memperbarui password', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);

            $this->addError('email', __($status));
        }
    }



    public function render()
    {
        return view('livewire.auth.reset-password', [
            'token' => $this->token,
        ]);
    }
}
