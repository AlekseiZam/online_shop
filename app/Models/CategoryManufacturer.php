<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryManufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers_of_categories';
    protected $guarded = false;
}
