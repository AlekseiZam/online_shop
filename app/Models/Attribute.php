<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $guarded = false;

    public function value()
    {
        return $this->belongsTo(AttributeValue::class, 'id', 'attribute_id');
    }
}
