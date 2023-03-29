<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre_en' => $this->faker->words(7, true),
            'corp_en' => $this->faker->paragraph(10),
            'titre_fr' => $this->faker->words(7, true),
            'corp_fr' => $this->faker->paragraph(10),
            'id_categorie' => Categorie::all()->random()->id,
            'id_user' => User::all()->random()->id,
        ];
    }
}
