<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    protected $fillable = [
    	'city_id', 'code'
    ];
}
