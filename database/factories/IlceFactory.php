<?php

namespace Database\Factories;

use App\Models\Ilce;
use Illuminate\Database\Eloquent\Factories\Factory;

class IlceFactory extends Factory
{

    protected $model = Ilce::class;


    public function definition()
    {
        //$ilce_name = $this->faker->sentence(3);
        $ilce_name = $this->faker->unique()->city;
        return [
            'adi' => $ilce_name,
            'il_id' => mt_rand(1,81)
        ];
    }

}
