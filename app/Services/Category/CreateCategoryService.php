<?php


namespace App\Services\Category;


use App\Models\Category;

class CreateCategoryService
{

    public function execute($data)
    {
        return Category::create($data);
    }

}
