
<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <div>
                <h2 style="font-size: 24px; font-weight: bold; color: #801818;">
                    My Profile
                </h2>
                <p style="font-size: 14px; color: #765858; margin-top: 5px;">
                    Manage your account information and security.
                </p>
            </div>

            <a href="{{ route('dashboard') }}"
               style="background: #801818; color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                &larr; Dashboard
            </a>
        </div>
    </x-slot>

    <div style="background: #F8EEEE; min-height: 100vh; padding: 35px 20px;">
        <div style="max-width: 1000px; margin: 0 auto;">

            <!-- Profile Header -->
            <div style="background: linear-gradient(135deg, #641212, #801818); color: white; padding: 30px; border-radius: 16px; margin-bottom: 25px; box-shadow: 0 5px 18px #80181822;">
                <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                    <div style="width: 85px; height: 85px; background: #F8EEEE; color: #801818; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: bold; flex-shrink: 0;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h1 style="font-size: 26px; font-weight: bold; margin: 0;">
                            {{ auth()->user()->name }}
                        </h1>

                        <p style="margin-top: 6px; opacity: 0.9;">
                            {{ auth()->user()->email }}
                        </p>

                        <span style="display: inline-block; margin-top: 10px; padding: 5px 12px; background: #ffffff30; border-radius: 20px; font-size: 12px;">
                            {{ ucfirst(auth()->user()->role ?? 'Student') }} Account
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div style="background: white; padding: 25px; border-radius: 14px; margin-bottom: 22px; box-shadow: 0 3px 12px #8018180A; border: 1px solid #E5C7C7; border-left: 5px solid #801818;">
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 19px; font-weight: bold; color: #801818;">
                        👤 Profile Information
                    </h3>
                    <p style="font-size: 14px; color: #765858; margin-top: 6px;">
                        Update your name and email address.
                    </p>
                </div>

                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Change Password -->
            <div style="background: white; padding: 25px; border-radius: 14px; margin-bottom: 22px; box-shadow: 0 3px 12px #8018180A; border: 1px solid #E5C7C7; border-left: 5px solid #A34A4A;">
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 19px; font-weight: bold; color: #801818;">
                        🔒 Change Password
                    </h3>
                    <p style="font-size: 14px; color: #765858; margin-top: 6px;">
                        Keep your account secure by using a strong password.
                    </p>
                </div>

                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account -->
            <div style="background: white; padding: 25px; border-radius: 14px; margin-bottom: 22px; box-shadow: 0 3px 12px #8018180A; border: 1px solid #E5C7C7; border-left: 5px solid #641212;">
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 19px; font-weight: bold; color: #641212;">
                        ⚠️ Delete Account
                    </h3>
                    <p style="font-size: 14px; color: #765858; margin-top: 6px;">
                        This action is permanent. Review carefully before deleting your account.
                    </p>
                </div>

                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
