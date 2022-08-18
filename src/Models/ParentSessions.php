<?php

namespace Wainwright\CasinoDog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;
#use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ParentGameSessions extends Eloquent  {
    protected $table = 'wainwright_parent_sessions';
    protected $timestamp = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'token_internal',
        'player_id',
        'player_operator_id',
        'game_id',
        'game_provider',
        'currency',
        'state',
        'operator_id',
        'token_original',
        'token_original_bridge',
    ];

    protected $casts = [
        'expired_bool' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'extra_meta' => 'json',
        'user_agent' => 'json'
    ];

}