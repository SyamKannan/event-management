  <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">


      <h2 class="text-2xl font-bold text-gray-800 mb-6">Create Event</h2>


      <form wire:submit.prevent="createEvent" class="grid grid-cols-1 gap-6">

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Title</label>
              <input type="text" wire:model="title"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
              @error('title')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Date</label>
              <input type="date" wire:model="date"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
              @error('date')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Time</label>
              <input type="time" wire:model="time"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
              @error('time')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Event Type</label>
              <select wire:model="event_type"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                  <option value="">Select Type</option>
                  <option value="Meeting">Meeting</option>
                  <option value="Celebration">Celebration</option>
                  <option value="Seminar">Seminar</option>
              </select>
              @error('event_type')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Event For</label>

              <select wire:model="event_for_id"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">

                  <option value="">Select User</option>

                  @if (auth()->check())
                      <option value="{{ auth()->id() }}">Self</option>
                  @endif

                  @foreach ($users as $user)
                      @if (auth()->check() && auth()->id() !== $user->id)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endif
                  @endforeach

              </select>

              @error('event_for_id')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Guidelines</label>
              <textarea wire:model="event_guidelines"
                  class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"></textarea>
              @error('event_guidelines')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <label class="block mb-2 text-sm font-medium text-gray-700">Invite Users</label>

              <div class="relative">
                  <select wire:model="invited_users" multiple
                      class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm h-48 p-2">

                      @foreach ($users as $user)
                          @if (auth()->id() != $user->id)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endif
                      @endforeach

                  </select>
                  <p class="text-xs text-gray-500 mt-1">Hold Ctrl (Windows) or Cmd (Mac) to select multiple users.
                  </p>
              </div>

              @error('invited_users.*')
                  <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
              @enderror
          </div>

          <div>
              <button type="submit"
                  style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 4px; border: none;">
                  Create Event</button>

          </div>

      </form>
  </div>
