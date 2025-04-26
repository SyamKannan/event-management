<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- @extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2 sm:mb-0">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-600">Manage all your events easily from here.</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('events.create') }}"
                   class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Event
                </a>
            </div>
        </div>

        <!-- Event List Section -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Your Events</h2>
            
            @livewire('event-index')
        </div>
    </div>
</div>
@endsection --}}
