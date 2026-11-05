
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Student Services Request System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --falu-red: #801818;
            --dark-falu-red: #641212;
            --light-bg: #F8EEEE;
            --border-color: #E5C7C7;
            --text-dark: #351C1C;
            --text-muted: #765858;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            color: var(--text-dark);
            background: var(--light-bg);
        }

        .app-background {
            min-height: 100vh;
            background: var(--light-bg);
        }

        .app-page-heading {
            background: #FFFFFF;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 3px 12px rgba(128, 24, 24, 0.05);
        }

        .app-page-heading-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 24px;
        }

        .app-page-content {
            width: 100%;
            min-height: calc(100vh - 100px);
        }

        a {
            transition: color 0.2s ease;
        }

        button {
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline-color: var(--falu-red);
        }

        @media (max-width: 640px) {
            .app-page-heading-inner {
                padding: 18px 16px;
            }
        }
    </style>
</head>

<body class="antialiased">
    <div class="app-background">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="app-page-heading">
                <div class="app-page-heading-inner">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="app-page-content">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
