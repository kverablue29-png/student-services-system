
<x-guest-layout>
    <style>
        body {
            background: #F8EEEE !important;
        }

        .confirm-container {
            max-width: 460px;
            margin: 0 auto;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid #E5C7C7;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(128, 24, 24, 0.10);
        }

        .confirm-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #F0DCDC;
            color: #801818;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .confirm-title {
            color: #801818;
            font-size: 27px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 10px;
        }

        .confirm-description {
            color: #765858;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            margin-bottom: 24px;
        }

        .confirm-label {
            display: block;
            color: #351C1C;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .confirm-input {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #D8B5B5;
            border-radius: 8px;
            color: #351C1C;
            background: #FFFFFF;
            outline: none;
            box-sizing: border-box;
        }

        .confirm-input:focus {
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        .confirm-button {
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

        .confirm-button:hover {
            background: #641212;
        }

        .confirm-error {
            color: #B42318;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>

    <div class="confirm-container">
        <div class="confirm-icon">🔒</div>

        <h1 class="confirm-title">Confirm Password</h1>

        <p class="confirm-description">
            This is a secure area of the Student Services Request System.
            Please enter your password to continue.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <label for="password" class="confirm-label">
                    Password
                </label>

                <input
                    id="password"
                    class="confirm-input"
                    type="password"
                    name="password"
                    required
                    autofocus
                    autocomplete="current-password"
                    placeholder="Enter your current password"
                >

                @if ($errors->get('password'))
                    <div class="confirm-error">
                        @foreach ($errors->get('password') as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="confirm-button">
                Confirm Password
            </button>
        </form>
    </div>
</x-guest-layout>
