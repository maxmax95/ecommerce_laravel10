<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Users;
use App\Models\Category;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nome = $this->faker->unique()->word;
        $paragraph_num = 1;
        return [
            'name' => $nome,
            'description' => $this->faker->paragraph($paragraph_num),
            'price' => $this->faker->randomNumber(2),
            'slug' => Str::slug($nome),
            'image' => $this->faker->imageUrl(400, 400),
            'id_user' => Users::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random(),
        ];
    }
}
