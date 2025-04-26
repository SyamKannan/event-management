<div class="py-6 max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $event->title }}</h2>

    <div class="text-gray-600 mb-4">
        <p class="text-lg"><strong>Date:</strong> {{ $event->date }} | <strong>Time:</strong> {{ $event->time }}</p>
        <p class="text-lg"><strong>Type:</strong> {{ $event->event_type }}</p>
        <p class="text-lg"><strong>For:</strong> {{ $event->eventFor->name }}</p>
        <p class="text-lg"><strong>Guidelines:</strong> {{ $event->event_guidelines }}</p>
    </div>

    {{-- Invitation Actions --}}
    @if ($invitation && $invitation->status === 'Pending')
        <div class="flex gap-4 mt-6">
            <button type="button" wire:click="acceptInvitation"
                style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 4px; border: none;">
                Accept
            </button>

            <button type="button" wire:click="rejectInvitation"
                style="background-color: #ef4444; color: white; padding: 8px 16px; border-radius: 4px; border: none;">
                Reject
            </button>
        </div>
    @endif

    {{-- Expiry Message --}}
    @if ($event->isExpired())
        <p class="text-red-500 mt-4 font-semibold">This event has expired.</p>
    @endif

    {{-- Links --}}
    <div class="mt-6 flex items-center gap-12">

        <a href="{{ route('events.requisitions', $event) }}"
            class="text-blue-500 hover:text-blue-700 font-semibold underline transition duration-200"> View Requisition
            List
        </a>

        <a href="{{ route('events.gallery', $event) }}"
            class="text-blue-500 hover:text-blue-700 font-semibold underline transition duration-200"> View Gallery
        </a>
    </div>

</div>
