<?php

namespace Wainwright\CasinoDog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Route;


class OperatorAccess extends Eloquent  {
    protected $table = 'wainwright_operator_access';
    protected $timestamp = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'operator_key',
        'operator_secret',
        'operator_access',
        'callback_url',
        'ownedBy',
        'active'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_used_at' => 'datetime'
    ];
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }


}