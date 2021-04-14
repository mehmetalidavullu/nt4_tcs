<?php

namespace Database\Factories;

use App\Models\Iletisim;
use Illuminate\Database\Eloquent\Factories\Factory;

class IletisimFactory extends Factory
{

    protected $model = Iletisim::class;


    public function definition()
    {
        //$iletisim_name = $this->faker->city();
        return [
            'sira' => mt_rand(0,20),
            'baslik' => $this->faker->unique()->company,
            'adres' => $this->faker->address,
            'telefon' => $this->faker->phoneNumber,
            'telefon2' => $this->faker->phoneNumber,
            'telefon3' => $this->faker->phoneNumber,
            'gsm' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'neredeyiz' => $this->faker->streetName,
            'ulas' => $this->faker->firstName(),
            'aciklama' => $this->faker->paragraph(2),
            'harita' => $this->faker->country,
            'dilgrup' => mt_rand(1,10),
            'dil' => mt_rand(1,9)
        ];
    }
}
