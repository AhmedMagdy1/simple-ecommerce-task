<?php


namespace App\Services\Product;


use App\Models\Product;

class CreateProductService
{
    private $uploadProductImageService;
    public function __construct(UploadProductImageService $uploadProductImageService )
    {
        $this->uploadProductImageService = $uploadProductImageService;
    }

    public function execute($data)
    {
        if(isset($data['image_path']) && $data['image_path'] != null)
            $data = $this->uploadProductImageService->execute($data);
        $products = Product::create($data);
        $products->tags()->syncWithoutDetaching($data['tags']);
    }


}
