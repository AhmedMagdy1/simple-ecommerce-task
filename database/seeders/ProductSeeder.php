<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(20)->create()->each(function ($product){
            $product->tags()->attach(Tag::query()->inRandomOrder()->take(rand(1,6))->pluck('id'));
        });
    }
}
