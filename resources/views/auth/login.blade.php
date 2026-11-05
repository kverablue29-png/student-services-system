
<x-guest-layout>
    <div style="margin-bottom: 25px; text-align: center;">
        <h1 style="font-size: 28px; font-weight: bold; color: #801818;">
            Student Services
        </h1>
        <p style="font-size: 14px; color: #765858; margin-top: 6px;">
            Sign in to your account
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Login Role -->
        <div>
            <x-input-label
                :value="__('Login as')"
                style="color: #641212;"
            />

            <div class="flex gap-6 mt-3">
                <label class="flex items-center gap-2">
                    <input
                        type="radio"
                        name="role"
                        value="admin"
                        required
                        {{ old('role') === 'admin' ? 'checked' : '' }}
                        style="accent-color: #801818;"
                    >
                    <span style="color: #351C1C;">Admin</span>
                </label>

                <label class="flex items-center gap-2">
                    <input
                        type="radio"
                        name="role"
                        value="student"
                        required
                        {{ old('role', 'student') === 'student' ? 'checked' : '' }}
                        style="accent-color: #801818;"
                    >
                    <span style="color: #351C1C;">Student</span>
                </label>
            </div>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" style="color: #641212;" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" style="color: #641212;" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    style="border-color: #C58B8B; color: #801818;"
                    class="rounded shadow-sm focus:ring-2"
                >

                <span class="ms-2 text-sm" style="color: #765858;">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-end mt-5">
            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    style="color: #801818; font-size: 14px; text-decoration: underline;"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button
                type="submit"
                class="ms-3"
                style="background: #801818; color: white; padding: 10px 22px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer;"
            >
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>
