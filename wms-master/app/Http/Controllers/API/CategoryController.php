<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryResource::collection(ProductCategory::all());

        return response()->json($categories);
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $request->validated();

        $name = $request->input('name');

        $category = ProductCategory::create([
            'name' => $name,
            'created_by' => auth()->id(),
        ]);

        if ($category->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function show(ProductCategory $productCategory)
    {
        return response()->json($productCategory);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $request->validated();

        $name = $request->input('name');

        $productCategory->update([
            'name' => $name,
        ]);

        if ($productCategory->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $delete = $productCategory->delete();

        if ($delete) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
