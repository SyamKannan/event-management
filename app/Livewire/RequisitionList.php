<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\RequisitionItem;
use Livewire\Component;

class RequisitionList extends Component
{
    public $event, $name, $is_public = false, $is_gift = false;

      protected $rules = [
          'name' => 'required|string|max:255',
          'is_public' => 'boolean',
          'is_gift' => 'boolean',
      ];

      public function mount(Event $event)
      {
          $this->event = $event;
          $this->authorize('view', $event);
      }

      public function addItem()
      {
          $this->authorize('create', [RequisitionItem::class, $this->event]);
          $this->validate();

          if ($this->event->isExpired()) {
              session()->flash('error', 'Cannot add items to expired event.');
              return;
          }

          RequisitionItem::create([
              'event_id' => $this->event->id,
              'name' => $this->name,
              'is_public' => $this->is_public,
              'is_gift' => $this->is_gift,
              'created_by_id' => auth()->id(),
          ]);

          $this->reset(['name', 'is_public', 'is_gift']);
          session()->flash('message', 'Item added successfully!');
      }

      public function claimItem($itemId)
      {
          $item = RequisitionItem::findOrFail($itemId);
          $this->authorize('claim', $item);

          if ($this->event->isExpired()) {
              session()->flash('error', 'Cannot claim items for expired event.');
              return;
          }

          $item->update(['claimed_by_id' => auth()->id()]);
          session()->flash('message', 'Item claimed successfully!');
      }

      public function render()
      { 
          return view('livewire.requisition-list', [
              'items' => $this->event->requisitionItems,
          ])->layout('layouts.app');
      }
}
