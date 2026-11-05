
<x-guest-layout>
    <style>
        body {
            background: #F8EEEE !important;
        }

        .reset-container {
            max-width: 460px;
            margin: 0 auto;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid #E5C7C7;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(128, 24, 24, 0.10);
        }

        .reset-title {
            color: #801818;
            font-size: 27px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 8px;
        }

        .reset-subtitle {
            color: #765858;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            margin-bottom: 24px;
        }

        .reset-label {
            display: block;
            color: #351C1C;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .reset-input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #D8B5B5;
            border-radius: 8px;
            color: #351C1C;
            background: #FFFFFF;
            outline: none;
            box-sizing: border-box;
        }

        .reset-input:focus {
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        .reset-button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            background: #801818;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .reset-button:hover {
            background: #641212;
        }

        .reset-error {
            color: #B42318;
            font-size: 13px;
            margin-top: 5px;
        }

        .reset-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .reset-link {
            color: #801818;
            font-weight: 600;
            text-decoration: none;
        }

        .reset-link:hover {
            color: #641212;
            text-decoration: underline;
        }
    </style>

    <div class="reset-container">
        <h1 class="reset-title">Reset Password</h1>

        <p class="reset-subtitle">
            Create a new password for your Student Services account.
        </p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <!-- Email Address -->
            <div>
                <label for="email" class="reset-label">
                    Email Address
                </label>

                <input
                    id="email"
                    class="reset-input"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email"
                >

                @if ($errors->get('email'))
                    <div class="reset-error">
                        @foreach ($errors->get('email') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div style="margin-top: 18px;">
                <label for="password" class="reset-label">
                    New Password
                </label>

                <input
                    id="password"
                    class="reset-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Enter your new password"
                >

                @if ($errors->get('password'))
                    <div class="reset-error">
                        @foreach ($errors->get('password') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div style="margin-top: 18px;">
                <label for="password_confirmation" class="reset-label">
                    Confirm New Password
                </label>

                <input
                    id="password_confirmation"
                    class="reset-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Enter your new password again"
                >

                @if ($errors->get('password_confirmation'))
                    <div class="reset-error">
                        @foreach ($errors->get('password_confirmation') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="reset-button">
                Reset Password
            </button>
        </form>

        <div class="reset-footer">
            <a href="{{ route('login') }}" class="reset-link">
                ← Back to Login
            </a>
        </div>
    </div>
</x-guest-layout>
