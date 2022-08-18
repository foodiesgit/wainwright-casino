<?php

namespace Wainwright\CasinoDog\Filament\Filawire;

use Livewire\Component;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use App\Http\Controllers\ExtGameController;
use Illuminate\Support\Facades\Response;
use Wainwright\CasinoDog\Models\Gameslist;

class FilaGamesOverview extends Component
{
    public $loadedGame = false;

    public function mount()
    {
        $this->games;
    }

    public function games()
    {
        $count = Gameslist::count();

        if($count > 0) {
            if($count < 25) {
                $this->games = Gameslist::all()->random($count);
            } else {
                $this->games = Gameslist::all()->random('25');
            }
        } else {
            $this->games = NULL;
        }
    }

    public function render(Request $request)
    {
		if($request->slug !== NULL) {
    	 	$selectGame = Gameslist::all()->where('game_id', $request->slug)->first();
    	 	if(!$selectGame) {
    	 		Filament::notify('danger', 'Oops..');

	      		return view('wainwright::livewire.launcher-wire')->with(['viewType' => 'error', 'text' => 'Game not found, select another game or retry.']);
    	 	}

    	 	if($selectGame) {
    	 		$prepareData = json_encode([
    	 			'user' => auth()->user()->id,
                    'player_id' => auth()->user()->player_id,
    	 			'game' => $selectGame->game_id,
    	 			'currency' => auth()->user()->active_currency,
    	 			'mode' => 'real'
    	 		]);
    	 		$requestNewGame = ExtGameController::createSession($prepareData);
                $status = $requestNewGame->status();
                if($status === 200) {
                    $array = json_decode($requestNewGame->content(), true);
                    $url = $array['url'];
                } else {
                    Filament::notify('danger', 'Oops.. error '.$status);
                    return view('livewire.launcher-wire')->with(['viewType' => 'error', 'text' => $requestNewGame]);
                }
    	 	}

      		return view('wainwright::filament.filawire.livewire.launcher')->with(['viewType' => 'gamelaunch', 'slug' => $selectGame->game_id, 'game_name' => $selectGame->game_name, 'url' => $url, 'text' => 'Goodluck!']);
		}

    	if($request->slug === NULL) {
            if(Gameslist::count() > 25) {
    	 	$games = Gameslist::all()->random('25');
            return view('wainwright::filament.filawire.random-games-polling')->with(['games' => $games, 'viewType' => 'no-game-selected', 'text' => 'You first need to a select a game to start playing.']);
            } else {
                return view('wainwright::filament.filawire.launcher')->with(['viewType' => 'gamelaunch', 'slug' => 'none', 'game_name' => 'none.com', 'url' => 'none.com', 'text' => 'Goodluck!']);

            }
    	}

    }

}
