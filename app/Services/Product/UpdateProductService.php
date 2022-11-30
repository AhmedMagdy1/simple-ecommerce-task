<?php


namespace App\Services\Product;


use App\Models\Product;

class UpdateProductService
{
    private $uploadProductImageService;
    public function __construct(UploadProductImageService $uploadProductImageService )
    {
        $this->uploadProductImageService = $uploadProductImageService;
    }

    public function execute($id, $data)
    {
        if(isset($data['image_path']) && $data['image_path'] != null)
            $data = $this->uploadProductImageService->execute($data);
        $products = Product::findOrFail($id);
        $products->update($data);
        $products->refresh();
        $products->tags()->sync($data['tags']);
    }

}
