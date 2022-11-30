<?php

namespace App\Http\Controllers;

use App\FormBuilder\CreateForm;
use App\FormBuilder\UpdateForm;
use App\Http\Requests\Category\FilterRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Services\Category\CreateProductService;
use App\Services\Category\DeleteCategoryService;
use App\Services\Category\FilterCategoriesService;
use App\Services\Category\LookupCategoryService;
use App\Services\Category\ShowCategoryService;
use App\Services\Category\UpdateCategoryService;
use Modules\Marketplace\Models\Product;

class CategoryController extends Controller
{

    public function index(FilterRequest $request, FilterCategoriesService $filterCategoriesService)
    {
        return view('category.index', ['categories' => $filterCategoriesService->execute($request->validated())]);
    }

    public function create(CreateForm $createForm)
    {
        $createForm->setAction(route('categories.store'));
        return view('category.form', $createForm->all() );
    }

    public function store(StoreRequest $request, CreateProductService $createCategoryService)
    {
        $createCategoryService->execute($request->validated());
        return redirect()->route('categories.index')->with('success','Category has been created successfully.');
    }

    public function edit($id, ShowCategoryService $categoryService, UpdateForm $updateForm)
    {
        $updateForm->setAction(route('categories.update',$id));
        $updateForm->setData($categoryService->execute($id));
        return view('category.form', $updateForm->all());
    }

    public function update(StoreRequest $request, $id, UpdateCategoryService $updateCategoryService)
    {
        $updateCategoryService->execute($id, $request->validated());
        return redirect()->route('categories.index')->with('success','Category has been updated successfully.');

    }

    public function destroy($id, DeleteCategoryService $deleteCategoryService)
    {
        $deleteCategoryService->execute($id);
    }

    public function search(LookupCategoryService $lookupCategoryService)
    {
        return $lookupCategoryService->execute();
    }
}
