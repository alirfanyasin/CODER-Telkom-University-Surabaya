<?php

namespace App\Livewire\App;

use App\Models\Presence;
use App\Models\User;
use App\Models\UserPresence;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title("Edit Presensi")]
#[Layout("layouts.auth")]

class PresenceShare extends Component
{
    use LivewireAlert;
    #[Validate('required', message: 'User ID wajib di isi', translate: true)]
    public $userId;
    public $presence;

    public function mount($slug, $presence){
        $this->presence = Presence::where("id", $presence)->with("userPresences")->first();
        if (!$this->presence) {
            return redirect()->to("/");
        }
    }

    public function render()
    {
        return view('livewire.app.presence-share');
    }

    public function absensi(){
        $this->validate();
        $user = User::where("identity_code", $this->userId)->first();
        if (!$user) {
            $this->alert('error', "User tidak ditemukan", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
            return;
        }
        $userPresence = $this->searchUserPresence($user->id);
        if (!$userPresence) {
            $this->alert('error', "Anda Berbeda divisi", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
            return;
        }
        if($this->presence->status != "active"){
            $this->alert('error', "Presensi sudah ditutup", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
            return;
        }
        try {
            $userPresence->update([
                "status" => "hadir"
            ]);
            $this->alert('success', 'Berhasil Melakukan Absensi', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
            return redirect()->to("/");

        } catch (\Throwable $th) {
            $this->alert('error', "Gagal melakukan update presensi", [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => false,
            ]);
        }
    }
    private function searchUserPresence($userId){
        foreach ($this->presence->userPresences as $value) {
            if ($value->user_id == $userId) {
                return $value;
                break;
            }
        }
        return null;
    }
}
