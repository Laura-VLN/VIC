<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaches_users extends Model
{
    protected $fillable = [
        'coach_id', 'user_id'
    ];
}
