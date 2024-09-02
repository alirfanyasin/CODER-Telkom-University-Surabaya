<?php

namespace App\Livewire\App;

use App\Livewire\Forms\FormMeetingUpdate;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Pertemuan')]
#[Layout('layouts.app')]

class MeetingEdit extends Component
{
    public FormMeetingUpdate $form;
    public Meeting $meeting;
    public $end_date;
    public $selectTypeMeeting;
    public function mount($id){
        $data=Meeting::where(["division_id" => Auth::user()->division_id, "slug"=>$id])->first();
        $this->meeting = $data;
        $this->form->setData($data);
        $this->end_date = $this->form->end_time;
        $this->selectTypeMeeting = $data->type;
    }

    public function render()
    {
        return view('livewire.app.meeting-edit');
    }

    public function save(){
        $this->form->type = $this->selectTypeMeeting;
        $time = [
            "date_time" => $this->form->date_time,
            "end_time" => $this->end_date
        ];
        $timeFormated = $this->TimeFormated($time);
        $this->form->end_time = $timeFormated[1];
        $data = $this->validate();
        try {
            $this->meeting->update([
                "name" => $data["name"],
                "date_time" => $timeFormated[0],
                "end_time" => $timeFormated[1],
                "type" => $data["type"],
                "link" => $data["link"] ?? null,
                "location" => $data["location"] ?? null,
                "description" => $data["description"],
                "status" => "aktif",
                "division_id" => Auth::user()->division_id
            ]);
            return redirect()->to("/app/e-learning/meeting");
        } catch (\Exception $th) {
            $this->addError('save', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }

    }
    private function TimeFormated($data){
        $dateTimeCarbon = Carbon::parse($data["date_time"]);
        $endTimeFormatted = null;
        if ($data["end_time"]) {
            $endTimeCarbon = $dateTimeCarbon->copy()->setTimeFromTimeString($data["end_time"]);
            $endTimeFormatted = $endTimeCarbon->format('Y-m-d H:i');
        }

        $dateTimeFormated = $dateTimeCarbon->format('Y-m-d H:i');
        return [$dateTimeFormated, $endTimeFormatted];
    }
}
