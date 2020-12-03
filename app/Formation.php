<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'email','description','location','time','phone','proximity'
    ];
}
