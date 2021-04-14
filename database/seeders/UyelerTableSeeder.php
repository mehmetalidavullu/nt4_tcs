<?php

namespace Database\Seeders;

use App\Models\Uyeler;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UyelerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE uyeler');
        Uyeler::factory(20)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
