<?php

namespace Database\Factories;

use App\Models\Uyeler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UyelerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Uyeler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isim' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'sifre' => bcrypt($this->faker->password),
            'admin' => mt_rand(1,10),
            'yetki' => $this->faker->colorName,
            'mail_token' => Str::random(10),
        ];
    }
}
