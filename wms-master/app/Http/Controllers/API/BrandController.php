<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductBrandRequest;
use App\Http\Requests\UpdateProductBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\ProductBrand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = BrandResource::collection(ProductBrand::all());

        return response()->json($brands);
    }


    public function store(StoreProductBrandRequest $request)
    {
        $request->validated();

        $name = $request->input('name');

        $brand = ProductBrand::create([
            'name' => $name,
            'created_by' => auth()->id(),
        ]);

        if ($brand->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }


    public function show(ProductBrand $productBrand)
    {
        return response()->json($productBrand);
    }


    public function update(UpdateProductBrandRequest $request, ProductBrand $productBrand)
    {
        $request->validated();

        $name = $request->input('name');

        $productBrand->update([
            'name' => $name,
        ]);

        if ($productBrand->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function destroy(ProductBrand $productBrand)
    {
        $delete = $productBrand->delete();

        if ($delete) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
