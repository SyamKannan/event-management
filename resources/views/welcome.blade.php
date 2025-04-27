<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Ensure Tailwind CSS is included -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-2xl font-semibold mb-6 text-gray-800">Event Management System</h1>
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Welcome</h2>
            <div class="space-x-4">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-md">
                    Login
                </a>
                @endif
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 shadow-md">
                    Register
                </a>
                @endif
            </div>
        </div>
    </div>
</body>

</html>