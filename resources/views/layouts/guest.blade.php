
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Student Services Request System') }}</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

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

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            color: var(--text-dark);
            background: var(--light-bg);
        }

        .guest-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 35px 18px;
            background:
                radial-gradient(circle at top left, #F0DCDC 0, transparent 35%),
                var(--light-bg);
        }

        .guest-brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .guest-brand-link {
            text-decoration: none;
            display: inline-block;
        }

        .guest-logo {
            width: 76px;
            height: 76px;
            display: block;
            object-fit: contain;
            margin: 0 auto 12px;
            border-radius: 20px;
            box-shadow: 0 8px 18px rgba(128, 24, 24, 0.20);
        }

        .guest-brand-name {
            color: var(--falu-red);
            font-size: 21px;
            font-weight: 800;
            margin: 0;
        }

        .guest-brand-description {
            color: var(--text-muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .guest-card {
            width: 100%;
            max-width: 460px;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 8px 28px rgba(128, 24, 24, 0.09);
        }

        .guest-footer {
            margin-top: 25px;
            text-align: center;
            color: var(--text-muted);
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .guest-page {
                padding: 25px 14px;
            }

            .guest-card {
                padding: 22px 18px;
            }

            .guest-brand-name {
                font-size: 19px;
            }
        }
    </style>
</head>

<body>
    <main class="guest-page">
        <div class="guest-brand">
            <a href="/" class="guest-brand-link">
                <img
                    src="{{ asset('favicon.svg') }}"
                    alt="Student Services Logo"
                    class="guest-logo"
                >

                <h1 class="guest-brand-name">Student Services</h1>
            </a>

            <p class="guest-brand-description">
                Student Services Request System
            </p>
        </div>

        <div class="guest-card">
            {{ $slot }}
        </div>

        <footer class="guest-footer">
            &copy; {{ date('Y') }} Student Services Request System.
            All rights reserved.
        </footer>
    </main>
</body>
</html>
