<?php


namespace App\Services\Category;


use App\Models\Category;

class UpdateCategoryService
{

    public function execute($id, $data)
    {
        Category::findOrFail($id)->update($data);
    }

}
