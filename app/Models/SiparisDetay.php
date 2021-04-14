<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiparisDetay extends Model
{
    use HasFactory;
    protected $table = "siparis_detay";
    protected $guarded = [];
    public $timestamps = false;
}
