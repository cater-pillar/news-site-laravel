<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $photos = [
            '490x370_kosarka-ilustracija-foto-jv-vanja-keser-2.jpg',
            '490x370_Opsta-bolnica-Leskovac-januar-2018-foto-Bojana-Antic.jpg',
            '800x600_800x600-korona-testiranje-foto-vkeser.webp',
            '800x600_Cika-Mitke.jpg',
        ];

        return [
            'title' => $this->faker->sentence(),
            'extract' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'category_id' => mt_rand(1,7),
            'photo' => $photos[mt_rand(0,3)]
        ];
    }



}
