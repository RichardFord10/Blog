<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Richard Ford') }}</title>
    <link rel="icon" type="image/svg+xml" href="/logo/code-tag.svg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Scripts/Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

@include('layouts.navigation')

<body class="font-sans antialiased">
    <x-messages />
    <div class="min-h-screen bg-custom-gradient">
        <!-- Page Heading -->
        @if (isset($header))
        <header class="dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>