<x-guest-layout>
    <!-- Session Status -->
    <x-auth.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-12 space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <div class="relative flex items-center">
                <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Enter email" required autofocus autocomplete="username" />
                    <x-auth.email-icon/>
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div>
            <x-forms.input-label for="password" :value="__('Password')" />
            <div class="relative flex items-center">
                <x-forms.text-input id="password" type="password" name="password" placeholder="Enter password" required autocomplete="current-password" />
                    <x-auth.pass-icon />
                <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div>
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                    <!-- Remember Me -->
                    <input id="remember_me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-slate-300 rounded" name="remember">
                     <label for="remember_me" class="ml-3 block text-sm text-slate-900">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div div class="text-sm">
                    @if (Route::has('password.request'))
                        <a class="text-blue-600 hover:underline font-semibold" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="!mt-12">
                <x-buttons.primary-button>
                    {{ __('Log in') }}
                </x-buttons.primary-button>
            </div>
        </div>

        </div>
    </form>
</x-guest-layout>
