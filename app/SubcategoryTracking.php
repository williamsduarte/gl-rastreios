<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryTracking;
use App\Category;

class SubcategoryTracking extends Model
{
    public $table = 'subcategories_trackings';
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function catguia()
    {
        return $this->hasOne(Category::class, 'id', 'cat_guia');
    }
}
