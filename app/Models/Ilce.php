<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilce extends Model
{
    use HasFactory;
    protected $table = "ilce";
    protected $guarded = [];
    public $timestamps = false;

}
