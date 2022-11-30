<?php

namespace App\Services\Product;

use App\Models\Product;

class DeleteProductService
{
    function execute($id)
    {
        Product::findOrFail($id)->delete();
    }
}
