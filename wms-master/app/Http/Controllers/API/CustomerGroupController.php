<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerGroupRequest;
use App\Http\Requests\UpdateCustomerGroupRequest;
use App\Http\Resources\CustomerGroupResource;
use App\Models\CustomerGroup;

class CustomerGroupController extends Controller
{

    public function index()
    {
        $groups = CustomerGroupResource::collection(CustomerGroup::all());

        return response()->json($groups);
    }


    public function store(StoreCustomerGroupRequest $request)
    {
        $request->validated();

        $title = $request->input('title');
        $discount = $request->input('discount');
        $isDefault = $request->input('is_default');

        if ($isDefault) {
            CustomerGroup::updateDefault();
        }

        $customerGroup = CustomerGroup::create([
            'title' => $title,
            'discount' => $discount,
            'is_default' => $isDefault,
        ]);


        if ($customerGroup->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }


    public function show(CustomerGroup $customerGroup)
    {
        return response()->json($customerGroup);
    }


    public function update(UpdateCustomerGroupRequest $request, CustomerGroup $customerGroup)
    {
        $request->validated();

        $title = $request->input('title');
        $discount = $request->input('discount');
        $isDefault = $request->input('is_default');

        if ($isDefault) {
            CustomerGroup::updateDefault();
        }

        $customerGroup->update([
            'title' => $title,
            'discount' => $discount,
            'is_default' => $isDefault,
        ]);

        if ($customerGroup->save()) {
            return response()->json('Update Success', 201);
        }
        return response()->json('Update Failed');
    }

    public function destroy(CustomerGroup $customerGroup)
    {
        if (!$customerGroup->is_default) {
            $customerGroup->delete();
            return response()->json('Delete Success');
        }

        return response()->json("Default Customer Group can't be delete");
    }
}
