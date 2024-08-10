<?php

namespace App\Livewire\Components;

use App\Models\Chatting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Chat extends Component
{
    public $userTo;

    #[Rule('required', message: "Tulis pesan")]
    public $chat;



    public function getUser($id)
    {
        $this->userTo = $id;
    }


    public function sendChat()
    {
        $this->validate();

        Chatting::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id' => $this->userTo,
            'chat' => $this->chat,
            'time' => now()->timezone('Asia/Jakarta')
        ]);

        $this->reset('chat');
    }

    public function render()
    {

        $userByDivision = User::where('division_id', Auth::user()->division_id)->whereNot('id', Auth::user()->id)->get();
        return view('livewire.components.chat', [
            'chats' => Chatting::where(function ($query) {
                $query->where('from_user_id', Auth::user()->id)
                    ->where('to_user_id', $this->userTo);
            })
                ->orWhere(function ($query) {
                    $query->where('from_user_id', $this->userTo)
                        ->where('to_user_id', Auth::user()->id);
                })
                ->orderBy('created_at', 'asc')
                ->get(),
            'datas' => $userByDivision,
        ]);
    }


    // return view('livewire.chat', [
    //     'chats' => modelChat::where(function ($query) {
    //         $query->where('from_user_id', Auth::user()->id)
    //             ->where('to_user_id', $this->userTo);
    //     })
    //         ->orWhere(function ($query) {
    //             $query->where('from_user_id', $this->userTo)
    //                 ->where('to_user_id', Auth::user()->id);
    //         })
    //         ->get(),
    //     'users' => User::all()
    // ]);
}
