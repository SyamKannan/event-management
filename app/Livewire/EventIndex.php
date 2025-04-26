<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventIndex extends Component
{
    public function render()
    {
        $events = Event::where('creator_id', auth()->id())
            ->orWhere('event_for_id', auth()->id())
            ->orWhereHas('invitations', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
      
        return view('livewire.event-index', [
            'events' => $events,
        ])->layout('layouts.app');
    }
}
