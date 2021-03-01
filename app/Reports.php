<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = [
        'title', 'description', 'author_id', 'author_name', 'young_id', 'time', 'hour'
    ];
}