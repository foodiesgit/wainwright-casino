<x-guest-layout>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 dark:bg-gray-800">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
            <h2 class="dark:text-white">
                <p>If you are not server host, contact your server host to reset password. Server host can recreate admin user in console:</p>
                <p class="mt-2 mb-3">
                    <span class="text-indigo-500">
                        php artisan casino-dog:create-admin-user
                    </span>
                </p>
            </h2>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}">
                <x-jet-button class="mr-2">
                {{ __('Return to Login') }}
                </x-jet-button>
            </a>
            </div>
    </div>


</div>
</x-guest-layout>
