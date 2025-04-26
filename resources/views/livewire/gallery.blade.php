<div class="p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Gallery for {{ $event->title }}</h2>

    @can('create', [App\Models\Gallery::class, $event])
        <form wire:submit.prevent="uploadImage" class="bg-white p-6 rounded-lg shadow space-y-4 mb-8">
            <div>
                <label class="block text-gray-700 mb-2">Upload Image</label>
                <input type="file" wire:model="image"
                    class="border rounded-md p-2 w-full focus:ring focus:ring-blue-200">
                @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition">
                Upload Image
            </button>
        </form>
    @endcan

    <div>
        <h3 class="text-2xl font-semibold mb-6">Uploaded Images</h3>

        <div class="p-8">
            <h2 class="text-3xl font-bold mb-6">Gallery for {{ $event->title }}</h2>
        
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @forelse ($images as $image)
                    <div class="relative rounded overflow-hidden shadow-lg group">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            class="w-full h-48 object-cover group-hover:opacity-75 transition">
                    </div>
                @empty
                    <p class="text-gray-500 text-center col-span-4">No images uploaded yet.</p>
                @endforelse
            </div>
        </div>
        
    </div>
</div>
