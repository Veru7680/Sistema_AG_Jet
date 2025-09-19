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


        <!-- font awesome saque el link de la pagina -->
        <script src="https://kit.fontawesome.com/29c8011380.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

@include('layouts.partials.admin.navigation')
@include('layouts.partials.admin.sidebar')

<!-- Aquí es donde se mostrará la vista específica -->
<div class="p-4 sm:ml-64">
    @yield('content')
</div>

@stack('modals')
@livewireScripts
</body>

</html>
