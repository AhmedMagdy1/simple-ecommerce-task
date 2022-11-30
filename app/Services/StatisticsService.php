<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class StatisticsService
{
    function execute()
    {
        return [
            'tags' => Tag::all()->count(),
            'categories' => Category::all()->count(),
            'products' => Product::all()->count()
        ];
    }

}
