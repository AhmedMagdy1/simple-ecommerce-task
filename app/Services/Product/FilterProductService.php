<?php


namespace App\Services\Product;


use App\Models\Product;

class FilterProductService
{
    function execute($filters)
    {
        $data = Product::with('tags');
        if(isset($filters['name']) && $filters['name'] != '')
            $data->nameLike($filters['name']);
        return $data->orderBy('id', 'desc')->paginate(10);
    }
}
