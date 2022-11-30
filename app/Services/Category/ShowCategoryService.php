<?php


namespace App\Services\Category;


use App\Models\Category;

class ShowCategoryService
{
    function execute($id)
    {
        return Category::with('parent')->findOrFail($id);
    }
}
