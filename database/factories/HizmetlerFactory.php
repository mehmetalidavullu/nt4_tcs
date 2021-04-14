<?php

namespace Database\Factories;

use App\Models\Hizmetler;
use Illuminate\Database\Eloquent\Factories\Factory;

class HizmetlerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hizmetler::class;

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
            'metin' => $this->faker->paragraph(2),
            'enlem' => $this->faker->latitude,
            'boylam' => $this->faker->longitude,
            'tur' => mt_rand(0,20),
            'dilgrup' => mt_rand(1,10),
            'dil' => mt_rand(1,9)
        ];
    }
}
