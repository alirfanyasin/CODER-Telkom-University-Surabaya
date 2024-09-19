<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Ubah kata sandi')]
#[Layout('layouts.app')]

class ChangePassword extends Component
{
    use LivewireAlert;

    #[Validate('required', message: 'Password wajib diisi')]
    public $password;

    #[Validate('required', message: 'Password baru wajib diisi')]
    #[Validate('min:6', message: 'Minimal 6 karakter')]
    public $new_password;

    #[Validate('required', message: 'Konfirmasi Password wajib diisi')]
    #[Validate('min:6', message: 'Minimal 6 karakter')]
    public $confirm_password;

    public function savePassword()
    {
        $this->validate();
        $currentUser = User::find(Auth::user()->id);

        if (!Hash::check($this->password, $currentUser->password)) {
            $this->alert('error', 'Password salah!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return;
        }

        if ($this->new_password !== $this->confirm_password) {
            $this->alert('error', 'Konfirmasi password salah!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            return;
        }

        $currentUser->update(['password' => Hash::make($this->new_password)]);
        $this->alert('success', 'Password berhasil disimpan!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->redirect('/app/profile');
    }


    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
