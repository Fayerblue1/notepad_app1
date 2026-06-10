<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    @if ((!request()->routeIs('dashboard')) && (!request()->routeIs('dashboard.*')))
        
    <header class="w-full px-16 py-8 flex items-center justify-between">


        <div class="text-5xl font-bold flex items-center">
            <span class="text-blue-600">My</span>
            <span class="text-lg-500">NotePad</span>
        </div>


        <nav class="flex items-center gap-16 text-[20px] text-gray-800">
            <a href="#" class="hover:text-blue-500 transition">Features</a>
            <a href="#" class="hover:text-blue-500 transition">Pricing</a>
            <a href="#" class="hover:text-blue-500 transition">Login</a>


            <a href="{{ route('login') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-10 py-4 rounded-full transition">
                Sign up for free
            </a>
        </nav>
    </header>
    @endif

    {{ $slot }}

    @livewireScripts
</body>

</html>
