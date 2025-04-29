<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Gallery as ModelsGallery;
use Livewire\WithFileUploads;
use Livewire\Component;

class Gallery extends Component
{
    use WithFileUploads;

    public $event, $image;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->authorize('view', $event);
    }

    public function uploadImage()
    {
        $this->validate(['image' => 'required|image|max:2048']);
        $this->authorize('create', [Gallery::class, $this->event]);

        $path = $this->image->store('gallery', 'public');

        Gallery::create([
            'event_id' => $this->event->id,
            'user_id' => auth()->id(),
            'image_path' => $path,
        ]);

        $this->reset('image');
        session()->flash('message', 'Image uploaded successfully!');
    }

    public function render()
    {
        return view('livewire.gallery', [
            'images' => $this->event->gallery,
        ])->layout('layouts.app');
    }
}
