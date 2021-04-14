<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Il extends Model
{
    use HasFactory;

    protected $table = "il";
    protected $guarded = [];
    public $timestamps = false;

    public function ilceleri()
    {
        return $this->hasMany(Ilce::class, 'il_id');

    }
}
