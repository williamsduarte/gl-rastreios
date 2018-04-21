<?php

namespace App;

use \App\Category;
use \App\District;
use \App\Phone;
use \App\Place;
use \App\Zipcode;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'company_uuid',
        'plan_id',
        'state_id',
        'city_id',
        'zipcode_id',
        'place_id',
        'district_id',
        'name_fantasy',
        'description',
        'numeral',
        'complement',
        'website',
        'email',
        'facebook',
        'twitter',
        'google',
        'name_responsible',
        'tags',
        'active',
        'tag_title',
        'tag_description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

 
    public function phones()
    {
        return $this->belongsToMany(Phone::class)->orderBy('type', 'ASC');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function zipcode()
    {
        return $this->belongsTo(Zipcode::class);
    }


}
