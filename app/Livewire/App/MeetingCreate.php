<?php

namespace App\Livewire\App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\FormMeetingCreate;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Buat Pertemuan')]
#[Layout('layouts.app')]

class MeetingCreate extends Component
{
    public FormMeetingCreate $form;
    public $selectTypeMeeting;

    public function mount(){
        $this->selectTypeMeeting = "online";
        $this->form->type = $this->selectTypeMeeting;
    }

    public function render()
    {
        return view('livewire.app.meeting-create');
    }
    public function updatedSelectTypeMeeting($value){
        $this->form->link = $value === "offline" ? "" : $this->form->link;
        $this->form->location = $value === "offline" ? $this->form->location : "";
    }

    public function save(){
        $this->form->type = $this->selectTypeMeeting;
        $data = $this->validate();
        $time = $this->TimeFormated($data);
        try {
            Meeting::create([
                "slug" => $this->generateSlug(),
                "name" => $data["name"],
                "date_time" => $time[0],
                "end_time" => $time[1],
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


    private function generateSlug(){
        while (true) {
            $slug = 'MEET-' . strtoupper(Str::random(10));

            $slug_count = DB::table("meetings")->where('slug', $slug)->count();

            if ($slug_count == 0) {
                break;
            }
        }
        return $slug;
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
