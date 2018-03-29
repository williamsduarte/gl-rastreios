<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryTracking;

class SubcategoryTracking extends Model
{
    public $table = 'subcategories_trackings';
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(CategoryTracking::class, 'id', 'category_id');
    }
}
