<?php

namespace Database\Seeders;

use App\Models\Referanslar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferanslarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE referanslar');
        Referanslar::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
