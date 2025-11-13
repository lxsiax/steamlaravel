<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mi Aplicación') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen">

    <header class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">{{ config('app.name', 'Mi Aplicación') }}</h1>
            <nav>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-6">
        {{ $slot }}
    </main>

</body>
</html>
