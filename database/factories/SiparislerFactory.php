<?php

namespace Database\Factories;

use App\Models\Siparisler;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiparislerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siparisler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'siparisno' =>$this->faker->unique()->numberBetween(0,201),
            'tarih' =>  $this->faker->dateTime(),
            'gonderimtarihi' => $this->faker->dateTime(),
            'firmaid' => mt_rand(0,200),
            'adresid' => mt_rand(0,200),
            'aciklama' => $this->faker->paragraph,
            'email' => $this->faker->companyEmail,
            'odemetipi' => mt_rand(0,3),
        ];
    }
}
