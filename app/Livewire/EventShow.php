<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventShow extends Component
{
    public $event;
    
    public function mount(Event $event)
    { 
        $this->event = $event;
        $this->authorize('view', $event);
    }

    public function acceptInvitation()
    {
        $invitation = $this->event->invitations()->where('user_id', auth()->id())->first();
        $invitation->update(['status' => 'Accepted']);
        session()->flash('message', 'Invitation accepted!');
    }

    public function rejectInvitation()
    {
        $invitation = $this->event->invitations()->where('user_id', auth()->id())->first();
        $invitation->update(['status' => 'Rejected']);
        session()->flash('message', 'Invitation rejected!');
    }

    public function render()
    {
        return view('livewire.event-show', [
            'invitation' => $this->event->invitations()->where('user_id', auth()->id())->first(),
        ])->layout('layouts.app');
    }
}
