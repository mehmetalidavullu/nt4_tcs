<?php

namespace Database\Factories;

use App\Models\Referanslar;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferanslarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Referanslar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $baslik = $this->faker->unique()->company;
        return [
            'sira' => mt_rand(0,20),
            'baslik'  => $baslik,
            'baslik2' => $baslik,
            'baslik3' => $baslik,
            'baslik4' => $baslik,
            'dilgrup' => mt_rand(1,10),
            'dil' => mt_rand(1,9)
        ];
    }
}
