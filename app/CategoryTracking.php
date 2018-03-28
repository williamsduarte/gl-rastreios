<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubcategoryTracking;

class CategoryTracking extends Model
{
    public $table = 'categories_trackings';

    public function subcategories()
    {
        return $this->hasMany(SubcategoryTracking::class, 'category_id', 'id');
    }
}
