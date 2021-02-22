<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = [
        'title', 'content', 'author_id'
    ];
}
