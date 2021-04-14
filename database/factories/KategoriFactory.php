<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;


class KategoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kategori::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item = $this->faker->title;
        return [
            'ustid' => mt_rand(0,5),
            'tur' => 1,
            'sira' => mt_rand(1,10),
            'baslik' => $item,
            'baslik2' => $item,
            'baslik3' => $item,
            'metin' => $this->faker->paragraph(3),
            'link' => $this->faker->url,
            'link1' => $this->faker->url,
            'link2' => $this->faker->url,
            'link3' => $this->faker->url,
            'hidden' => mt_rand(0,1),
            'acik' => mt_rand(0,1),
            'tip' => mt_rand(0,100),
            'dilgrup' => mt_rand(1,9),
            'dil' => mt_rand(1,10),
            'description' => $this->faker->paragraph(3),
            'keywords' => $this->faker->word
        ];
    }
}
