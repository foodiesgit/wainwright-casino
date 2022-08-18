<x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight dark:text-white">
            {{ __('Casino Dog: Status Overview') }}
        </h2>
</x-slot>
<div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
<svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
<div>
    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
</div>
</div>
    <!-- Start Container !-->
    <div class="p-6 sm:px-12 bg-white dark:bg-gray-800 bg-opacity-25">
        <!-- Start Info Block !-->
        <div class="text-xl">
            <p>
                <span class="font-semibold text-gray-800 leading-tight dark:text-white mr-2">Telescope Status</span>
                <br>
                @if (Route::has('telescope'))
                    <small class="text-gray-500"> seems to be installed succesfully</small>
                    @else
                    <small class="text-gray-500"> seems to not be installed</small>
                @endif
            </p>
        </div>
        <div class="mt-2 text-gray-500 dark:text-gray-400">
            <p>Telescope is great assistance in inspecting every single request, your cache, queues, exceptions, log viewer - all in one. This also makes it the most powerful part within this package, so disable Telescope in productional environments.</p>
            @if (!Route::has('telescope'))
                <p class="mt-4 font-semibold">Seems Telescope is missing (by checking if route exist). To install Laravel Telescope, run:</p>
                <p class="ml-2 mt-1 mb-1">
                    <span class="text-indigo-500">
                        composer require laravel/telescope <br>
                        php artisan telescope:install <br>
                        php artisan migrate
                    </span>
                </p>
            @else
            <a target="_blank" href="{{ route('telescope') }}">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-500">
                    <div>Go to Telescope</div>
                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
            </div>
            </a>
            @endif
        </div>
        <!-- End Info Block !-->
    </div>
    <!-- End Container !-->

    <div class="mt-6 mb-6"></div>
    <!-- Start Container !-->
    <div class="p-6 sm:px-12 bg-white dark:bg-gray-800 bg-opacity-25">
        <!-- Start Info Block !-->
        <div class="text-xl">
            <p>
                <span class="font-semibold text-gray-800 leading-tight dark:text-white mr-2">Cache Driver</span>
                <br>
                @if ($cache_state !== false or $cache_state !== NULL)
                    <small class="text-gray-500"> succesfully retrieved cache key. Cache test key was last set {{$cache_state->diffForHumans()}} at {{ $cache_state }}</small>
                    @else
                    <small class="text-gray-500"> seems to not be installed - {{ $cache_state }} </small>
                @endif
            </p>
        </div>
        <div class="mt-2 text-gray-500 dark:text-gray-400">
            <p>Having your cache driver work is very important because of the amount of data transformations performed within calls itself. There is fallback to database by default, but on any sort of sustainable kind of load you really want to use cache for short term storage in between transaction finalization.</p>
            <p class="mt-2 mb-2">The cache status above is checked by setting a key with as value the time of setting key for 10 seconds (to prevent spam). If it shows longer as 10 seconds above, you need to check in to your cache driver. If there is any kind of error trying to retrieve cache it will be displayed here.</p>
            <a target="_blank" href="https://laravel.com/docs/9.x/cache">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-500">
                    <div>Read about cache in Laravel Docs</div>
                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
            </div>
            </a>
        </div>
        <!-- End Info Block !-->
    </div>
    <!-- End Container !-->

    @if(CasinoDog::check_admin(auth()->user())) {
    @livewire('operator-keys')
    @endif

</div><script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>