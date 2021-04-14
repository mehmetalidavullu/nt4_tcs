<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparisler extends Model
{
    use HasFactory;
    protected $table = "siparisler";
    protected $guarded = [];
    public $timestamps = false;


    public function siparisDetay()
    {
        return $this->hasMany(SiparisDetay::class, 'siparisid');

    }
}
