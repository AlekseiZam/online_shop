<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = false;

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brands_of_categories', 'category_id', 'brand_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attributes_of_categories', 'category_id', 'attribute_id');
    }

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class, 'manufacturers_of_categories', 'category_id', 'manufacturer_id');
    }

}
