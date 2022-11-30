<?php


namespace App\Services\Category;


use App\Models\Category;

class FilterCategoriesService
{
    function execute($filters)
    {
        $data = Category::with('parent');
        if(isset($filters['name']) && $filters['name'] != '')
            $data->nameLike($filters['name']);
        return $data->orderBy('id', 'desc')->paginate(10);
    }
}
