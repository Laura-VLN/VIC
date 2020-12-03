<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HousingGallery extends Model
{
    protected $fillable = [
        'housing_id','img_link'
    ];
}
