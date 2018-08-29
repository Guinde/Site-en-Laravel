<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'position', 'gamesPlayed', 'goals', 'assists', 'cards', 'teamId'
    ];
}
