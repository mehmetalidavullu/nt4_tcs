<?php

namespace Database\Seeders;

use App\Models\Il;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE il');
        Il::factory(81)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
