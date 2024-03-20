<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuePoint extends Model
{
    use HasFactory;
    protected $table = 'issue_points';
    protected $guarded = false;
}
