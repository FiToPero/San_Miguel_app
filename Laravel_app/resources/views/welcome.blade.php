<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'San Miguel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Welcome to San Miguel!
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Laravel + Filament + Tailwind CSS
            </p>
            
            @if (Route::has('login'))
                <div class="mt-8 flex gap-4 justify-center">
                    @auth
                        <a href="{{ url('/admin') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Log in
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
          