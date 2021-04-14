<?php

namespace Database\Seeders;

use App\Models\Subeler;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubelerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE subeler');
        Subeler::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
