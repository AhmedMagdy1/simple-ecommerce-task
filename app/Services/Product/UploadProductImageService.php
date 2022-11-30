<?php


namespace App\Services\Product;


class UploadProductImageService
{

    public function execute($data)
    {
        $imageName = time() . '.' . $data['image_path']->extension();
        $data['image_path']->move(storage_path('app/public/products'), $imageName);
        $data['image_path'] = '/storage/products/' . $imageName;
        return $data;
    }
}
