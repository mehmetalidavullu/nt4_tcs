<?php

namespace Database\Seeders;

use App\Models\Odemeler;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdemelerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE odemeler');
        Odemeler::factory(50)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
