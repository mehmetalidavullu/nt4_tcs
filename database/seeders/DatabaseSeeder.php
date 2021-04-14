<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(IlTableSeeder::class);
        $this->call(IlceTableSeeder::class);
        $this->call(IletisimTableSeeder::class);
        $this->call(UyelerTableSeeder::class);
        $this->call(HizmetlerTableSeeder::class);
        $this->call(ReferanslarTableSeeder::class);
        $this->call(SubelerTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(UrunlerTableSeeder::class);
        $this->call(OdemelerTableSeeder::class);
        $this->call(SiparislerTableSeeder::class);
        $this->call(SiparisDetayTableSeeder::class);
    }
}
