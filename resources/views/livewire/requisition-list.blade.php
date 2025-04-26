<div class="space-y-8 p-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-4">Requisition List for {{ $event->title }}</h2>

    @can('create', [App\Models\RequisitionItem::class, $event])
        <form wire:submit.prevent="addItem" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Item Name</label>
                <input type="text" wire:model="name"
                    class="border rounded-md p-2 w-full focus:border-blue-500 focus:ring focus:ring-blue-200">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" wire:model="is_public" id="is_public" class="rounded">
                <label for="is_public" class="text-gray-700">Public</label>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" wire:model="is_gift" id="is_gift" class="rounded">
                <label for="is_gift" class="text-gray-700">Gift</label>
            </div>

            <button type="submit"
                style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none;"
                class="hover:bg-blue-600 transition">
                Add Item
            </button>
        </form>
    @endcan

    <div>
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Items</h3>

        <div class="space-y-4">
            @foreach ($items as $item)
                @can('view', $item)
                    <div class="border rounded-lg p-4 bg-gray-50 shadow-sm">
                        <p class="text-lg font-medium text-gray-700">{{ $item->name }} 
                            <span class="text-sm text-gray-500">({{ $item->is_public ? 'Public' : 'Private' }})</span>
                        </p>
                        <p class="text-sm text-gray-600 mt-1">
                            Status: 
                            @if ($item->claimed_by_id)
                                <span class="text-green-600 font-semibold">Claimed by {{ $item->claimedBy->name }}</span>
                            @else
                                <span class="text-red-500 font-semibold">Unclaimed</span>
                            @endif
                        </p>

                        @if (
                            $item->claimed_by_id == null &&
                            $event->invitations()->where('user_id', auth()->id())->where('status', 'Accepted')->exists() &&
                            !$event->isExpired()
                        )
                            <button wire:click="claimItem({{ $item->id }})"
                                style="background-color: #10b981; color: white; padding: 8px 16px; border-radius: 6px; border: none;"
                                class="mt-4 hover:bg-green-600 transition">
                                Claim
                            </button>
                        @endif
                    </div>
                @endcan
            @endforeach
        </div>
    </div>

</div>
