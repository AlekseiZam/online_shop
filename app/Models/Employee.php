<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'employees';
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
