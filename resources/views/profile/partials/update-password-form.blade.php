
<section>
    <header>
        <h2 class="text-lg font-bold" style="color: #801818;">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #765858;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                style="border-color: #C58B8B; color: #351C1C;"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
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

            @if (session('status') === 'password-updated')
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
