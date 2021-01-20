<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsors_users extends Model
{
    protected $fillable = [
        'sponsor_id', 'user_id'
    ];
}
