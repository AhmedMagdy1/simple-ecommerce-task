<?php

namespace App\Http\Controllers;

use App\FormBuilder\CreateForm;
use App\FormBuilder\UpdateForm;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Services\Category\DeleteCategoryService;
use App\Services\Category\UpdateCategoryService;
use App\Services\Product\CreateProductService;
use App\Services\Product\DeleteProductService;
use App\Services\Product\FilterProductService;
use App\Services\Product\ShowProductService;
use App\Services\Product\UpdateProductService;
use App\Services\Tag\LookupTagService;

class ProductController extends Controller
{
    public function index(FilterRequest $request, FilterProductService $filterProductService)
    {
        return view('product.index', ['products' => $filterProductService->execute($request->validated())]);
    }

    public function create(CreateForm $createForm, LookupTagService $lookupTagService)
    {
        $createForm->setAction(route('products.store'));
        $createForm->pushLookup('tags', $lookupTagService->execute());
        return view('product.form', $createForm->all() );
    }

    public function store(StoreRequest $request, CreateProductService $createProductService)
    {
        $createProductService->execute($request->validated());
        return redirect()->route('products.index')->with('success','Product has been created successfully.');
    }

    public function edit($id, ShowProductService $showProductService, UpdateForm $updateForm, LookupTagService $lookupTagService)
    {
        $updateForm->setAction(route('products.update',$id));
        $updateForm->setData($showProductService->execute($id));
        $updateForm->pushLookup('tags', $lookupTagService->execute());
        return view('product.form', $updateForm->all());
    }

    public function update(UpdateRequest $request, $id, UpdateProductService $updateProductService)
    {
        $updateProductService->execute($id, $request->validated());
        return redirect()->route('products.index')->with('success','Product has been updated successfully.');

    }

    public function destroy($id, DeleteProductService $deleteProductService)
    {
        $deleteProductService->execute($id);
    }
}
