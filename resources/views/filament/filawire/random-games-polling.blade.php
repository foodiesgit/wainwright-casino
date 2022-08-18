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
