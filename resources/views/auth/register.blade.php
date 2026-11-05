
<x-guest-layout>
    <style>
        body {
            background: #F8EEEE !important;
        }

        .register-container {
            max-width: 460px;
            margin: 0 auto;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid #E5C7C7;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(128, 24, 24, 0.10);
        }

        .register-title {
            color: #801818;
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 6px;
        }

        .register-subtitle {
            color: #765858;
            text-align: center;
            font-size: 14px;
            margin-bottom: 26px;
        }

        .register-label {
            display: block;
            color: #351C1C;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .register-input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #D8B5B5;
            border-radius: 8px;
            color: #351C1C;
            background: #FFFFFF;
            outline: none;
            box-sizing: border-box;
        }

        .register-input:focus {
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        .register-button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            background: #801818;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-button:hover {
            background: #641212;
        }

        .register-link {
            color: #801818;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link:hover {
            color: #641212;
            text-decoration: underline;
        }

        .register-error {
            color: #B42318;
            font-size: 13px;
            margin-top: 5px;
        }

        .register-footer {
            text-align: center;
            margin-top: 22px;
            color: #765858;
            font-size: 14px;
        }
    </style>

    <div class="register-container">
        <h1 class="register-title">Create Account</h1>
        <p class="register-subtitle">
            Student Services Request System
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="register-label">Full Name</label>

                <input
                    id="name"
                    class="register-input"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Enter your full name"
                >

                @if ($errors->get('name'))
                    <div class="register-error">
                        @foreach ($errors->get('name') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div style="margin-top: 18px;">
                <label for="email" class="register-label">Email Address</label>

                <input
                    id="email"
                    class="register-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    placeholder="Enter your email"
                >

                @if ($errors->get('email'))
                    <div class="register-error">
                        @foreach ($errors->get('email') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div style="margin-top: 18px;">
                <label for="password" class="register-label">Password</label>

                <input
                    id="password"
                    class="register-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Create a password"
                >

                @if ($errors->get('password'))
                    <div class="register-error">
                        @foreach ($errors->get('password') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div style="margin-top: 18px;">
                <label for="password_confirmation" class="register-label">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    class="register-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Enter your password again"
                >

                @if ($errors->get('password_confirmation'))
                    <div class="register-error">
                        @foreach ($errors->get('password_confirmation') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="register-button">
                Create Account
            </button>
        </form>

        <div class="register-footer">
            Already have an account?
            <a href="{{ route('login') }}" class="register-link">
                Sign In
            </a>
        </div>
    </div>
</x-guest-layout>
