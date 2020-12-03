<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title','description','location','time','date','topic','user_id','follower_id','hour'
    ];
}
