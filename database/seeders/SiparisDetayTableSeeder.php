<?php

namespace Database\Seeders;

use App\Models\SiparisDetay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiparisDetayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE siparis_detay');
        SiparisDetay::factory(600)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
