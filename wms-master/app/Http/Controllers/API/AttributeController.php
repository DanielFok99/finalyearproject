<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Models\ProductAttribute;

class AttributeController extends Controller
{


    public function index()
    {
        $attributes = AttributeResource::collection(ProductAttribute::all());

        return response()->json($attributes);
    }

    public function store(StoreProductAttributeRequest $request)
    {
        $request->validated();

        $name = $request->input('name');

        $attribute = ProductAttribute::create([
            'name' => $name,
            'created_by' => auth()->id(),
        ]);

        if ($attribute->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function show(ProductAttribute $productAttribute)
    {
        return response()->json($productAttribute);
    }

    public function update(UpdateProductAttributeRequest $request, ProductAttribute $productAttribute)
    {
        $request->validated();

        $name = $request->input('name');

        $productAttribute->update([
            'name' => $name,
        ]);

        if ($productAttribute->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }


    public function destroy(ProductAttribute $productAttribute)
    {
        $delete = $productAttribute->delete();

        if ($delete) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
