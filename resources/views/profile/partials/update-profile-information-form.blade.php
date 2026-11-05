
<section>
    <header>
        <h2 class="text-lg font-bold" style="color: #801818;">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #765858;">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2" style="color: #641212;">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            style="color: #801818; text-decoration: underline;"
                            class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm" style="color: #216E36;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                style="background: #801818; color: white; padding: 10px 22px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer;"
                onmouseover="this.style.background='#641212'"
                onmouseout="this.style.background='#801818'"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm"
                    style="color: #216E36;"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
