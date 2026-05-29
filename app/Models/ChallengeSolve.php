<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeSolve extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id','challenge_key','solved_at'];

    protected $casts = [
        'solved_at' => 'datetime',
    ];
}
