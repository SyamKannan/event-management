<div class="py-6 max-w-2xl mx-auto p-6 mt-200 bg-white rounded-lg shadow-md">

    @if (session()->has('message'))
        <div class="mt-4 p-4 rounded" @class([
            'bg-green-100 text-green-700' => session('message_type') === 'success',
            'bg-red-100 text-red-700' => session('message_type') === 'error',
        ])>
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $event->title }}</h2>

    <div class="text-gray-600 mb-4">
        <p class="text-lg"><strong>Date:</strong> {{ $event->date }} | <strong>Time:</strong> {{ $event->time }}</p>
        <p class="text-lg"><strong>Type:</strong> {{ $event->event_type }}</p>

        @if ($event->event_for_id == auth()->id() && $event->creator_id == auth()->id())
            <p><span class="font-medium"><strong>For:</span></strong>

                @if ($event->event_for_id == auth()->id())
                    Self
                @else
                    {{ $event->eventFor->name }}
                @endif

            </p>
        @endif
        {{-- <p class="text-lg"><strong>For:</strong> {{ $event->eventFor->name }}</p> --}}
        <p class="text-lg"><strong>Guidelines:</strong> {{ $event->event_guidelines }}</p>
    </div>

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


    @if ($event->isExpired())
        <p class="text-red-500 mt-4 font-semibold">This event has expired.</p>
    @endif

    <div class="mt-6 flex flex-col gap-4">

        <a href="{{ route('events.requisitions', $event) }}"
            class="text-blue-500 hover:text-blue-700 font-semibold underline transition duration-200">
            View Requisition List
        </a>

        <a href="{{ route('events.gallery', $event) }}"
            class="text-blue-500 hover:text-blue-700 font-semibold underline transition duration-200">
            View Gallery
        </a>

    </div>


</div>
