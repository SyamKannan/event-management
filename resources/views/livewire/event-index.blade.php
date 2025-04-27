@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="py-6">



    @if ($events->isEmpty())
        <p class="text-gray-500 text-center">
            No events found.
            <a href="{{ route('events.create') }}" class="text-indigo-600 hover:text-indigo-800 underline" wire:navigate>
                Create one now!
            </a>
        </p>
    @else
        <div class="flex justify-end">
            <a href="{{ route('events.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md hover:bg-blue-700 transition duration-150 ease-in-out"
                wire:navigate
                style="padding: 10px; background-color: #3b82f6; color: white; font-size: 0.875rem; font-weight: 600; border-radius: 0.375rem;">
                + Create Event
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($events as $event)
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-lg p-6 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $event->title }}</h3>
                            <span
                                class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full px-2 py-1">
                                {{ $event->event_type }}
                            </span>
                        </div>

                        <div class="text-gray-600 text-sm space-y-1 mb-4">
                            <p><span class="font-medium">Date:</span> {{ $event->date->format('F j, Y') }}</p>
                            <p><span class="font-medium">Time:</span>
                                {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</p>
                            @if ($event->event_for_id == auth()->id() || $event->creator_id == auth()->id())
                                <p><span class="font-medium">For:</span>

                                    @if ($event->event_for_id == auth()->id())
                                        Self
                                    @else
                                        {{ $event->eventFor->name }}
                                    @endif

                                </p>
                            @endif
                        </div>
                    </div>

                    <div style="margin-top: 16px;">
                        <a href="{{ route('events.show', $event) }}"
                            style="display:inline-flex;align-items:center;justify-content:center;width:100%;padding:10px 20px;background-color:#4F46E5;color:#ffffff;font-size:14px;font-weight:600;border-radius:8px;text-decoration:none;transition:background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#4338CA';"
                            onmouseout="this.style.backgroundColor='#4F46E5';">
                            View Details
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    @endif
</div>
