<?php

namespace Database\Factories;

use App\Models\Odemeler;
use Illuminate\Database\Eloquent\Factories\Factory;

class OdemelerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Odemeler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'siparisno' => mt_rand(0,50),
            'uye_id'  => mt_rand(0,20),
            'tutar' => mt_rand(50,500),
            'tarih' => $this->faker->dateTime(),
            'kartsahibinincepnumarasi' => $this->faker->phoneNumber,
            'aciklama' => $this->faker->paragraph(3),
            'taksit' => mt_rand(1,36),
            'kartno' => $this->faker->creditCardNumber,
            'kartadi' => $this->faker->creditCardType
        ];
    }
}
