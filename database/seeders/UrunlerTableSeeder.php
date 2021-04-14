<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Urunler;

class UrunlerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //DB::statement('TRUNCATE TABLE urunler');
        Urunler::factory(500)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
