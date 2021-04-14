<?php

namespace Database\Factories;

use App\Models\Il;
use Illuminate\Database\Eloquent\Factories\Factory;

class IlFactory extends Factory
{

    protected $model = Il::class;


    public function definition()
    {
        //$il_name = $this->faker->sentence(1);
        $il_name = $this->faker->unique()->country;
        return [
            'adi' => $il_name,
        ];
    }
}
