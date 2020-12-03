<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    protected $fillable = [
        'location','area','type','price','availability','email','phone','description','proximity'
    ];
}
