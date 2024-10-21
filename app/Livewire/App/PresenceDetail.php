<?php

namespace App\Livewire\App;

use App\Exports\PresenceResultExport;
use App\Livewire\Forms\FormPresenceUpdate;
use App\Models\Points;
use App\Models\Presence;
use App\Models\UserPoints;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Presensi')]
#[Layout('layouts.app')]

class PresenceDetail extends Component
{
    use LivewireAlert;
    public FormPresenceUpdate $form;
    public $user_presence;
    public function mount($id)
    {
        $presence = Presence::where('id', $id)->with("userPresences", "userPresences.user")->first();

        $this->form->setData($presence);
        $this->user_presence = $this->form->user_presence;
    }
    public function render()
    {
        return view('livewire.app.presence-detail', [
            "members" => $this->user_presence
        ]);
    }
    public function status($id, $status)
    {
        foreach ($this->user_presence as $index => $value) {
            if ($value["id"] == $id) {
                $this->user_presence[$index]["status"] = $status;
                break;
            }
        }
    }

    public function exportPresenceResult()
    {
        if ($this->form->presence) {
            $this->alert('success', 'Berhasil Export Data', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'timerProgressBar' => true,
            ]);
            return Excel::download(new PresenceResultExport($this->form->presence->id), 'Presence - ' . $this->form->presence->id . ' - ' . Str::random(5) . '.xlsx',  \Maatwebsite\Excel\Excel::XLSX);
        }
        $this->alert('error', 'Tidak Ada presence', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
    public function save()
    {
        $this->form->user_presence = $this->user_presence;
        // $this->validate();
        $point = Points::where('name', 'Pertemuan')->first();
        DB::beginTransaction();
        try {
            $this->form->presence->update([
                "status" => "inActive"
            ]);
            foreach ($this->form->presence->userPresences as $index => $value) {
                $value->update([
                    "status" => $this->form->user_presence[$index]["status"]
                ]);
                if ($this->form->user_presence[$index]["status"] == "hadir") {
                    UserPoints::create([
                        'user_id' => $value->user_id,
                        'user_presence_id' => $value->id,
                        'points' => $point->points
                    ]);
                }
            }
            DB::commit();
            return $this->redirect("/app/presence");
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
        }
    }
}
