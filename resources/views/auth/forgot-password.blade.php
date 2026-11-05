
<x-guest-layout>
    <style>
        body {
            background: #F8EEEE !important;
        }

        .forgot-container {
            max-width: 460px;
            margin: 0 auto;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid #E5C7C7;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(128, 24, 24, 0.10);
        }

        .forgot-title {
            color: #801818;
            font-size: 27px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 8px;
        }

        .forgot-subtitle {
            color: #765858;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            margin-bottom: 24px;
        }

        .forgot-label {
            display: block;
            color: #351C1C;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .forgot-input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #D8B5B5;
            border-radius: 8px;
            color: #351C1C;
            background: #FFFFFF;
            outline: none;
            box-sizing: border-box;
        }

        .forgot-input:focus {
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        .forgot-button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #801818;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .forgot-button:hover {
            background: #641212;
        }

        .forgot-status {
            padding: 12px;
            margin-bottom: 18px;
            background: #F0DCDC;
            color: #641212;
            border: 1px solid #E5C7C7;
            border-radius: 8px;
            font-size: 14px;
        }

        .forgot-error {
            color: #B42318;
            font-size: 13px;
            margin-top: 5px;
        }

        .forgot-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
        }

        .forgot-link {
            color: #801818;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot-link:hover {
            color: #641212;
            text-decoration: underline;
        }
    </style>

    <div class="forgot-container">
        <h1 class="forgot-title">Forgot Password?</h1>

        <p class="forgot-subtitle">
            No problem! Enter your registered email address.
            We'll send you a link to reset your password.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="forgot-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="forgot-label">
                    Email Address
                </label>

                <input
                    id="email"
                    class="forgot-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="Enter your registered email"
                >

                @if ($errors->get('email'))
                    <div class="forgot-error">
                        @foreach ($errors->get('email') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="forgot-button">
                Email Password Reset Link
            </button>
        </form>

        <div class="forgot-footer">
            <a href="{{ route('login') }}" class="forgot-link">
                ← Back to Login
            </a>
        </div>
    </div>
</x-guest-layout>
