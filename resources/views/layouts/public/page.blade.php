<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general_setting->institute_initialism }} - {{ $general_setting->institute_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css ">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    html {
        font-family: Rubik, sans-serif!important;
    }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('header')
</head>
<body class="bg-gray-50">
    <main class="min-h-screen flex flex-col justify-between">
        <x-public.banner />
        <x-public.nav-bar />
        <div class="flex-grow">
            @yield('content')
        </div>
        <x-public.footer />
    </main>
    @yield('scripts')
</body>
</html>
