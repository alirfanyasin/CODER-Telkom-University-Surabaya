<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Profil')]
#[Layout('layouts.app')]

class ProfileEdit extends Component
{
    use LivewireAlert, WithFileUploads;

    public $userId;
    #[Validate('required', message: "Nama lengkap wajib diisi", translate: true)]
    #[Validate('min:3', message: "Minimal 3 karakter", translate: true)]
    #[Validate('max:50', message: 'Nama Lengkap maksimal 50 karakter', translate: true)]
    #[Validate('regex:/^[a-zA-Z\s]+$/', message: 'Tidak boleh mengandung spesial karakter', translate: true)]
    public $name;
    public $email;
    public $password;
    public $major;
    #[Validate('nullable')]
    #[Validate('digits:10', message: "Masukkan 10 digit angka", translate: true)]
    public $nim;
    #[Validate('nullable')]
    #[Validate('digits:4', message: "Masukkan 4 digit angka", translate: true)]
    public $batch;
    #[Validate('nullable')]
    #[Validate('digits:12', message: "Masukkan 12 digit angka", translate: true)]
    public $phone_number;
    #[Validate('nullable')]
    #[Validate('mimes:png,jpg,jpeg', message: "File tidak didukung", translate: true)]
    #[Validate('max:2048', message: "Maksimum 2 MB", translate: true)]
    public $avatar;
    public $github;
    public $identity_code;
    public $division_id;
    public $tag;
    public $currentAvatar;

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
        $this->currentAvatar = $user->avatar;
        $this->github = $user->github;
        $this->identity_code = $user->identity_code;
        $this->division_id = $user->division_id;
        $this->tag = $user->tag;
    }

    public function updateProfile()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);

        // File upload avatar
        if ($this->avatar && $this->avatar instanceof \Illuminate\Http\UploadedFile) {
            if ($user->avatar) {
                Storage::disk('public')->delete('avatar/' . $user->avatar);
            }
            $avatarName = Auth::user()->name . '_' . Str::random(5) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('avatar', $avatarName, 'public');
        } else {
            $avatarName = $this->currentAvatar;
        }


        // Update data
        $user->name = $this->name;
        $user->email = $this->email;
        $user->major = $this->major;
        $user->nim = $this->nim;
        $user->batch = $this->batch;
        $user->phone_number = $this->phone_number;
        $user->avatar = $avatarName;
        $user->github = $this->github;
        $user->identity_code = $this->identity_code;
        $user->division_id = $this->division_id;

        // Tag
        if ($this->tag == 'Empty') {
            $user->tag = NULL;
        } else {
            $user->tag = $this->tag;
        }

        $user->save();

        // Alert success
        $this->alert('success', 'Profile Berhasil Diupdate', [
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
