<?php

namespace App;

use \App\Company;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $fillable = [
    'id',
    'name',
    'active'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
  ];

  public function companies()
  {
    return $this->belongsToMany(Company::class);
  }

}
