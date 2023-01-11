<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductGroupRequest;
use App\Http\Requests\UpdateProductGroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\ProductGroup;

class GroupController extends Controller
{
    public function index()
    {
        $groups = GroupResource::collection(ProductGroup::all());

        return response()->json($groups);
    }


    public function store(StoreProductGroupRequest $request)
    {
        $request->validated();

        $name = $request->input('name');

        $attribute = ProductGroup::create([
            'name' => $name,
            'created_by' => auth()->id(),
        ]);

        if ($attribute->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function show(ProductGroup $productGroup)
    {
        return response()->json($productGroup);
    }


    public function update(UpdateProductGroupRequest $request, ProductGroup $productGroup)
    {
        $request->validated();

        $name = $request->input('name');

        $productGroup->update([
            'name' => $name,
        ]);

        if ($productGroup->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function destroy(ProductGroup $productGroup)
    {
        $delete = $productGroup->delete();

        if ($delete) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
