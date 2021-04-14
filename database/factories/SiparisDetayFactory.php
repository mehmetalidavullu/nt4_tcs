<?php

namespace Database\Factories;

use App\Models\SiparisDetay;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiparisDetayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiparisDetay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sipno = $this->faker->numberBetween(0,201);
        return [
            'siparisid' =>$sipno,
            'siparisno' =>$sipno,
            'urunid' =>  mt_rand(0,600),
            'adet' => mt_rand(0,15),
            'fiyat' => mt_rand(50,999),
            'varyant' => mt_rand(0,5)
        ];
    }
}
