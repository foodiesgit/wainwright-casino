 <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight dark:text-white mr-2">
            {{ __('Operator Panel') }}
        </h2>
    </x-slot>
        <div class="dark:bg-gray-900 dark:text-white mx-auto py-10">
        <x-jet-form-section submit="generateKey">
            <x-slot name="title">
                    <span class="dark:text-white">{{ __('Generate API Key') }}</span>
            </x-slot>
            <x-slot name="description">
                <span class="dark:text-gray-500">{{ __('Generate a new API key (tied to your user).') }}</span>
            </x-slot>
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="ip" value="{{ __('Enter Access IP (IPV4 only)') }}" />
                    <x-jet-input id="ip" placeholder="{{ $request_ip }}" type="text" class="mt-1 text-gray-800 block w-full" wire:model.defer="state.ip" />
                    <x-jet-input-error for="ip" class="mt-2" />
                    <x-jet-label class="mt-2" for="callback_url" value="{{ __('Callback URL') }}" />
                    <x-jet-input id="callback_url" placeholder="{{ env('APP_URL') }}/api/respins.io/games/callback" type="text" class="mt-1 text-gray-800 block w-full" wire:model.defer="state.callback_url" />
                    <x-jet-input-error for="callback_url" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="generatedKey">
                    Created key, refresh to see.
                </x-jet-action-message>
                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Generate New Key') }}
                 </x-jet-button>
            </x-slot>
            </x-jet-form-section>
        <div class="mt-5"></div>
        </div>
    </div>