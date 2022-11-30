<?php


namespace App\Services\Product;


use App\Models\Product;

class ShowProductService
{
    function execute($id)
    {
        return Product::with('category','tags')->findOrFail($id);
    }
}
