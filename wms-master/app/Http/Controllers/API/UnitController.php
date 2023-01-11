<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductUnitRequest;
use App\Http\Requests\UpdateProductUnitRequest;
use App\Http\Resources\UnitResource;
use App\Models\ProductUnit;

class UnitController extends Controller
{

    public function index()
    {
        $units = UnitResource::collection(ProductUnit::all());

        return response()->json($units);
    }


    public function store(StoreProductUnitRequest $request)
    {
        $request->validated();

        $name = $request->input('name');
        $shortName = $request->input('short_name');
        $isDefault = $request->input('is_default');

        if ($isDefault) {
            ProductUnit::updateDefault();
        }

        $attribute = ProductUnit::create([
            'name' => $name,
            'short_name' => $shortName,
            'is_default' => $isDefault,
            'created_by' => auth()->id(),
        ]);

        if ($attribute->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function show(ProductUnit $productUnit)
    {
        return response()->json($productUnit);
    }

    public function update(UpdateProductUnitRequest $request, ProductUnit $productUnit)
    {
        $request->validated();

        $name = $request->input('name');
        $shortName = $request->input('short_name');
        $isDefault = $request->input('is_default');

        if ($isDefault) {
            ProductUnit::updateDefault();
        }

        $productUnit->update([
            'name' => $name,
            'short_name' => $shortName,
            'is_default' => $isDefault,
        ]);

        if ($productUnit->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }


    public function destroy(ProductUnit $productUnit)
    {
        $delete = $productUnit->delete();

        if ($delete) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
