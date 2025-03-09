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

        <style>
            body {
                background-color: #f8f9fa;
                background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
            }
            .card {
                border-radius: 0.75rem;
                overflow: hidden;
            }
            .card-header {
                border-bottom: none;
                padding: 1.25rem;
            }
            .input-group-text {
                background-color: transparent;
            }
            .btn-primary {
                padding: 0.75rem;
                font-weight: 500;
                letter-spacing: 0.5px;
            }
        </style>
    </head>
    <body>
        <div class="container py-5">
            {{ $slot }}
        </div>
    </body>
</html>
