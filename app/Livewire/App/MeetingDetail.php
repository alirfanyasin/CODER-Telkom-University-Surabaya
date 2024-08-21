<?php

namespace App\Livewire\App;

use App\Livewire\Forms\FormMeetingUpdate;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Pertemuan')]
#[Layout('layouts.app')]

class MeetingDetail extends Component
{
    public FormMeetingUpdate $form;
    public $meetingStatus;
    public $selectTypeMeeting;
    public function mount($id){
        $data=Meeting::where(["division_id" => Auth::user()->division_id, "slug"=>$id])->first();
        $this->meetingStatus = $data->status;
        $this->form->setData($data);
        $this->selectTypeMeeting = $data->type;
    }
    public function render()
    {
        return view('livewire.app.meeting-detail');
    }
}
