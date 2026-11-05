
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold" style="color: #641212;">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm" style="color: #765858;">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="background: #641212; color: white; padding: 10px 20px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer;"
        onmouseover="this.style.background='#4A0D0D'"
        onmouseout="this.style.background='#641212'"
    >
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold" style="color: #641212;">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm" style="color: #765858;">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label
                    for="password"
                    :value="__('Password')"
                    class="sr-only"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    style="border-color: #C58B8B; color: #351C1C;"
                    placeholder="{{ __('Password') }}"
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    style="background: #F0DCDC; color: #641212; padding: 10px 18px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer;"
                >
                    {{ __('Cancel') }}
                </button>

                <button
                    type="submit"
                    style="background: #641212; color: white; padding: 10px 18px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer;"
                    onmouseover="this.style.background='#4A0D0D'"
                    onmouseout="this.style.background='#641212'"
                >
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
