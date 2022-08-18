@if($viewType === 'error')

    <h3>Error: {{ $text }}</h3>

@endif

@if($viewType === 'gamelaunch')
    <div class="embed-responsive embed-responsive-16by9 flex rounded bg-opacity-50 items-center justify-center relative w-full overflow-hidden" style="padding-top: 56.25%">

      <iframe
        class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 w-full h-full"
        src="{{ $url }}"
        allowfullscreen=""
      ></iframe>

    </div>
@endif

@if($viewType === 'no-game-selected')
<h3>{{ $text }}</h3>
@endif
<div>
<div class="mx-auto grid xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 pt-6 gap-8">
@if($games === NULL)
<h2>No games found.</h2>
@else
@foreach($games as $game)
    <a href="/casino/launcher?slug={{ $game->game_id }}" class=""><img class="object-cover rounded-md h-24 border-gray-300 dark:border-gray-700 border-dashed border-2 rounded" src="{{ $game->softswiss_s3 }}"></a>
@endforeach
@endif
</div>
</div>
