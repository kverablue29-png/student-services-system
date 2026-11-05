
<x-guest-layout>
    <style>
        body {
            background: #F8EEEE !important;
        }

        .verify-container {
            max-width: 460px;
            margin: 0 auto;
            padding: 30px;
            background: #FFFFFF;
            border: 1px solid #E5C7C7;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(128, 24, 24, 0.10);
            text-align: center;
        }

        .verify-icon {
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

        .verify-title {
            color: #801818;
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .verify-description {
            color: #765858;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .verify-success {
            padding: 12px;
            margin-bottom: 20px;
            background: #E7F5E9;
            border: 1px solid #B8DCC0;
            border-radius: 8px;
            color: #216E36;
            font-size: 14px;
            text-align: left;
        }

        .verify-button {
            width: 100%;
            padding: 12px;
            background: #801818;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .verify-button:hover {
            background: #641212;
        }

        .verify-logout {
            margin-top: 16px;
            padding: 8px 14px;
            background: transparent;
            border: 1px solid #D8B5B5;
            border-radius: 8px;
            color: #801818;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .verify-logout:hover {
            background: #F8EEEE;
        }

        .verify-note {
            color: #765858;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>

    <div class="verify-container">
        <div class="verify-icon">✉</div>

        <h1 class="verify-title">Verify Your Email</h1>

        <p class="verify-description">
            Thank you for registering with the Student Services Request System!
            Before getting started, please verify your email address by clicking
            the link we sent to your email.

            If you did not receive the email, you can request another verification link below.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="verify-success">
                A new verification link has been sent to the email address
                you provided during registration.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="verify-button">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="verify-logout">
                Log Out
            </button>
        </form>

        <p class="verify-note">
            Please check your inbox and spam folder.
        </p>
    </div>
</x-guest-layout>
