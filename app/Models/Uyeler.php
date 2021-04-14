<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uyeler extends Model
{
    use HasFactory;
    protected $table = "uyeler";
    protected $guarded = [];
    public $timestamps = false;
}
