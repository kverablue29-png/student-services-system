
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Services Request System</title>

    <style>
        :root {
            --falu-red: #801818;
            --dark-falu-red: #641212;
            --soft-falu-red: #C58B8B;
            --light-red: #F8EEEE;
            --white: #FFFFFF;
            --text: #351C1C;
            --muted: #765858;
            --border: #E5C7C7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--light-red);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: var(--falu-red);
            color: var(--white);
            padding: 20px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(100, 18, 18, 0.2);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 0.4px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        nav a {
            color: var(--white);
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        nav a:hover {
            background: var(--dark-falu-red);
        }

        nav .register-btn {
            background: var(--dark-falu-red);
            border: 1px solid var(--soft-falu-red);
        }

        nav .register-btn:hover {
            background: #501010;
        }

        main {
            width: 100%;
            max-width: 1150px;
            margin: auto;
            padding: 65px 25px;
            flex: 1;
        }

        .hero {
            text-align: center;
            background: var(--white);
            padding: 55px 30px;
            border-radius: 18px;
            border-top: 6px solid var(--falu-red);
            box-shadow: 0 8px 25px rgba(100, 18, 18, 0.08);
        }

        .hero h1 {
            color: var(--falu-red);
            font-size: clamp(28px, 4vw, 42px);
            margin-bottom: 20px;
            line-height: 1.25;
        }

        .hero p {
            color: var(--muted);
            font-size: 17px;
            line-height: 1.8;
            max-width: 720px;
            margin: 0 auto 28px;
        }

        .primary-btn {
            display: inline-block;
            background: var(--falu-red);
            color: var(--white);
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .primary-btn:hover {
            background: var(--dark-falu-red);
            transform: translateY(-2px);
        }

        .section-title {
            text-align: center;
            color: var(--falu-red);
            font-size: 28px;
            margin: 45px 0 25px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .feature-card {
            background: var(--white);
            padding: 28px 22px;
            border-radius: 12px;
            border: 1px solid var(--border);
            border-bottom: 4px solid var(--soft-falu-red);
            box-shadow: 0 4px 12px rgba(100, 18, 18, 0.05);
            transition: 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(100, 18, 18, 0.12);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-red);
            color: var(--falu-red);
            border-radius: 10px;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            color: var(--falu-red);
            margin-bottom: 12px;
            font-size: 19px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        footer {
            background: var(--falu-red);
            color: var(--white);
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            header {
                padding: 18px 5%;
                flex-direction: column;
                text-align: center;
            }

            .features {
                grid-template-columns: 1fr;
            }

            main {
                padding: 35px 18px;
            }

            .hero {
                padding: 38px 20px;
            }

            nav {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">Student Services</div>

        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-btn">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Student Services Request System</h1>

            <p>
                Welcome to the Student Services Request System.
                Submit your service requests, track their status,
                and stay updated through one convenient platform.
            </p>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="primary-btn">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="primary-btn">
                        Get Started
                    </a>
                @endauth
            @endif
        </section>

        <h2 class="section-title">Our Features</h2>

        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Submit Requests</h3>
                <p>
                    Send your student service requests online
                    without unnecessary paperwork.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Track Requests</h3>
                <p>
                    Check the status of your requests and see
                    updates as they are processed.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🏫</div>
                <h3>Easy Access</h3>
                <p>
                    Access student services through one
                    convenient and organized system.
                </p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Student Services Request System. All rights reserved.</p>
    </footer>
</body>
</html>
