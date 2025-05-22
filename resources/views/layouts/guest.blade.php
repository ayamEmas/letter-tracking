<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TRACE Systems') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col md:flex-row items-center justify-center font-sans bg-cover bg-center bg-no-repeat relative" style="background-image: url('/image/bg.jpg');">
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <div class="flex flex-col md:flex-row items-center w-full px-4 md:px-0 relative z-10 justify-center">
            
            <div class="w-full max-w-md p-6 bg-white rounded-xl shadow-xl md:ml-auto md:mr-8">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-application-logo class="w-16 h-16 md:w-20 md:h-20 fill-current text-gray-500" />
                    </a>
                </div>
                {{ $slot }}
            </div>
            <div class="text-center text-white mb-8 md:mb-0 md:ml-8 md:mr-auto">
                <h1 class="text-3xl md:text-6xl font-bold mb-6">TRACE Systems</h1>
                <div class="space-y-2">
                    <h2 class="text-2xl md:text-4xl font-normal">(Tracking Records</h2>
                    <h2 class="text-2xl md:text-4xl font-normal">And Correspondence Efficiently)</h2>
                </div>
            </div>
        </div>
    </body>

</html>
