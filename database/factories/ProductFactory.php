<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomId = Category::inRandomOrder()->first()->id;

        return [
            'name' => $this->faker->unique()->text(10),
            'description' => $this->faker->unique()->text(150),
            'category_id' => $randomId ? $randomId : null,
            'image_path' => 'https://dummyimage.com/640x360/fff/aaa'
        ];
    }
}
