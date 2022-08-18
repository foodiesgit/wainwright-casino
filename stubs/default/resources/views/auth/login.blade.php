<x-guest-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 dark:bg-gray-800">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
        <x-slot name="logo">
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-jet-label for="email" class="dark:text-white" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="dark:text-white" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class=" text-sm text-gray-600 dark:text-gray-400" href="{{ route('password.request') }}">
                        {{ __('Forgot password') }}
                    </a>
                @endif

                @if (CasinoDog::register_enabled() === true))
                <a href="{{ route('register') }}">
                <x-jet-secondary-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
                </a>
                @endif
                <x-jet-button class="ml-4">
                    {{ __('Log In') }}
                </x-jet-button>
            </div>
        </form>

</div></div>
</x-guest-layout>
