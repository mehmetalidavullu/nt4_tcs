<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subeler extends Model
{
    use HasFactory;
    protected $table = "subeler";
    protected $guarded = [];
    public $timestamps = false;
}
