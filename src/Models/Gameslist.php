<?php

namespace Wainwright\CasinoDog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;
use Wainwright\CasinoDog\Models\MetaData;
use DB;

class Gameslist extends Eloquent  {

    protected $table = 'wainwright_gameslist';
    protected $timestamp = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'gid',
        'slug',
        'name',
        'provider',
        'type',
        'typeRating',
        'popularity',
        'bonusbuy',
        'jackpot',
        'demoplay',
        'demolink',
        'origin_demolink',
        'source',
        'realmoney',
        'method',
        'enabled',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'enabled' => 'boolean',
        'realmoney' => 'json',
        'rawobject' => 'json'
    ];

    public function link(){
        $url = config('casino-dog.launcher_url') ?? env('APP_URL').'/games/launch/'.$game_slug;
        $complete_link = $url.'/'.$this->slug;
        return $complete_link;
    }
    public static function static_link($game_slug){
        $url = env('APP_URL').'/games/launch/'.$game_slug;
        return $url;
    }

    public function thumb($game_id)
    {
        $complete_link = config('gameconfig.thumbnail_square').$game_id.'.png';
        return $complete_link;
    }

    public static function thumbnail_square($game_id){
        $complete_link = config('gameconfig.thumbnail_square').$game_id.'.png';
        return $complete_link;
    }

    public static function thumbnail_wide($game_id) {
        $complete_link = config('gameconfig.thumbnail_wide').$game_id.'.png';
        return $complete_link;
    }


    public static function build_list() {
        $query = DB::table('respins_gameslist')->get();
        if($query->count() === 1) {
            $game = $query;
            $games_array = array(
            'gid' => $game->gid,
            'slug' => $game->slug,
            'name' => $game->name,
            'provider' => $game->provider,
            'method' => $game->method,
            'source' => $game->source,
            'popularity' => $game->popularity,
            'demoplay' => $game->demoplay,
            'demolink' => $game->demolink,
            'origin_demolink' => $game->origin_demolink,
            'enabled' => $game->enabled,
            'meta' => MetaData::retrieve_extended_game($game->gid)
            );
        } elseif($query->count() > 1)
        foreach($query as $game) {
            $games_array[] = array(
                'gid' => $game->gid,
                'slug' => $game->slug,
                'name' => $game->name,
                'provider' => $game->provider,
                'method' => $game->method,
                'source' => $game->source,
                'popularity' => $game->popularity,
                'demolink' => $game->demolink,
                'demoplay' => $game->demoplay,
                'origin_demolink' => $game->origin_demolink,
                'enabled' => $game->enabled,
                'meta' => MetaData::retrieve_extended_game($game->gid)
            );
        } else {
            $message = array('status' => 'error', 'data' => NULL, 'message' => 'No games found at all');
            return response()->json($message, 404);
        }

        $message = array('status' => 'success', 'data' => $games_array);
        return response()->json($message, 200);
    }


    public static function providers(){
        $query = Gameslist::distinct()->get('provider');

        $providers_array[] = array();
        foreach($query as $provider) {
            $provider_array[] = array(
                'slug' => $provider->provider,
                'provider' => $provider->provider,
                'name' => ucfirst($provider->provider),
                'methods' => 'demoModding',
            );
        }
        return json_encode($provider_array, true);
    }


}

