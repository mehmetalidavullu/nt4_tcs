<?php

namespace Database\Factories;

use App\Models\Subeler;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubelerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subeler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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
            'enlem' => $this->faker->latitude,
            'boylam' => $this->faker->longitude,
            'tur' => mt_rand(0,20),
            'dilgrup' => mt_rand(1,10),
            'dil' => mt_rand(1,9)
        ];
    }
}
