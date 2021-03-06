<?php

namespace Database\Seeders;

use App\Models\Ilce;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IlceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE ilce');
        Ilce::factory(200)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
