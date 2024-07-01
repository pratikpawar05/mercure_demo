<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\NewMessage;

class SendMessage extends Component
{
    public $message = '';

    public function sendMsg(){
        broadcast(new NewMessage($this->message));
        $this->js("alert('Message was sent!')");
        $this->message='';
    }

    public function render()
    {
        return view('livewire.send-message')
        ->layout('layouts.app');
    }
}
