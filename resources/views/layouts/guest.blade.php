<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Arvía')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Styles -->
    <style>
        body {
            background-color: #f9f7f5;
        }
        .container {
            max-width: 450px;
        }
 
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
    <body class="font-sans text-[#7a6b5f] antialiased">
        <div class="container mx-auto flex flex-col items-center justify-center">
            <div class="card w-full">
                <div class="flex items-center justify-center mb-4">
                    <!-- <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-[#7a6b5f]" />
                    </a> -->
                </div>

                <div class="px-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

