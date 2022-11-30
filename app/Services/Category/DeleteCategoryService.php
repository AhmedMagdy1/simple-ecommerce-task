<?php


namespace App\Services\Category;


use App\Models\Category;

class DeleteCategoryService
{
    function execute($id)
    {
        Category::findOrFail($id)->delete();
    }
}
