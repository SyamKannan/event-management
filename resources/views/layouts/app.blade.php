<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">

            <!-- Navigation -->
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow mb-8">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>

{{-- <!DOCTYPE html>
<html>

<head>
    <title>Event Management</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('events.index') }}" class="text-white">Event Management</a>
            @auth
                <div>
                    <span class="text-white">{{ auth()->user()->name }}</span>
                    <a href="{{ route('logout') }}" class="text-white ml-4">Logout</a>
                </div>
            @endauth
        </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    @livewireScripts
</body>

</html> --}}
