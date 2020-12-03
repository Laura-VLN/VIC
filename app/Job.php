<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'email','description','location','deadline','type','skills_needed','company','contact_people','proximity'
    ];
}