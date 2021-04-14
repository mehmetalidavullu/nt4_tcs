<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Database\Factories\KategoriFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE urunler');
        Kategori::factory(100)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
