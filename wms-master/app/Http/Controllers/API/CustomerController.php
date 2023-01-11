<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\CustomerGroup;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = CustomerResource::collection(Customer::all());


        return response()->json($customers);
    }

    public function store(StoreCustomerRequest $request)
    {
        $request->validated();

        $name = $request->input('customer_name');
        $contact = $request->input('customer_contact');
        $icNumber = $request->input('ic_number');
        $email = $request->input('email');
        $avatar = $request->input('avatar');
        $note = $request->input('note');
        $customerGroup = CustomerGroup::query()->findOrFail($request->input('customer_group_id'));

        $customer = Customer::create([
            'customer_name' => $name,
            'customer_contact' => $contact,
            'ic_number' => $icNumber,
            'email' => $email,
            'avatar' => $avatar,
            'note' => $note,
            'status' => 'activate',
            'customer_group_id' => $customerGroup->id,
            'created_by' => auth()->id(),
        ]);

        if ($customer->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');

    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }



    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $request->validated();

        $name = $request->input('customer_name');
        $contact = $request->input('customer_contact');
        $icNumber = $request->input('ic_number');
        $email = $request->input('email');
        $avatar = $request->input('avatar');
        $note = $request->input('note');
        $status = $request->input('status');
        $customerGroup = CustomerGroup::query()->findOrFail($request->input('customer_group_id'));

        $customer->update([
            'customer_name' => $name,
            'customer_contact' => $contact,
            'ic_number' => $icNumber,
            'email' => $email,
            'avatar' => $avatar,
            'note' => $note,
            'status' => $status,
            'customer_group_id' => $customerGroup->id,
        ]);

        if ($customer->save()) {
            return response()->json('Update Success', 201);
        }
        return response()->json('Update Failed');
    }

    public function destroy(Customer $customer)
    {
        $customer->update([
            'status' => 'deactivate'
        ]);
        if ($customer->save()) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
