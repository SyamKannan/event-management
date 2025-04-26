<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class EventCreate extends Component
{
    public $title, $date, $time, $event_type, $event_for_id, $event_guidelines, $invited_users = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required',
        'event_type' => 'required|in:Meeting,Celebration,Seminar',
        'event_for_id' => 'required|exists:users,id',
        'event_guidelines' => 'nullable|string',
        'invited_users' => 'array',
        'invited_users.*' => 'exists:users,id',
    ];

    public function createEvent()
    {
        $this->validate();

        $event = Event::create([
            'title' => $this->title,
            'date' => $this->date,
            'time' => $this->time,
            'event_type' => $this->event_type,
            'event_for_id' => $this->event_for_id,
            'event_guidelines' => $this->event_guidelines,
            'creator_id' => auth()->id(),

        ]);

        foreach ($this->invited_users as $user_id) {
            Invitation::create([
                'event_id' => $event->id,
                'user_id' => $user_id,
                'status' => 'Pending',
            ]);
        }   

        session()->flash('message', 'Event created successfully!');
        return redirect()->route('events.index');
    }


    public function render()
    {
        return view('livewire.event-create', [
            'users' => User::get(),
        ])->layout('layouts.app');
    }
}
