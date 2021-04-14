<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hizmetler extends Model
{
    use HasFactory;
    protected $table = "hizmetler";
    protected $guarded = [];
    public $timestamps = false;
}
