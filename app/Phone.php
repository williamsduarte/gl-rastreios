<?php

namespace App;

use Company;
use Illuminate\Database\Eloquent\Model;
use DB;

class Phone extends Model
{


    protected $fillable = [
        'code',
        'type',
        'number'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class)
                    ->select([
                      'name_fantasy',
                      'state_id',
                      'city_id'
                    ]);
    }


}
