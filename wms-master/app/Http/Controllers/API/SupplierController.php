<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = SupplierResource::collection(Supplier::all());

        return response()->json($suppliers);
    }

    public function store(StoreSupplierRequest $request)
    {
        $request->validated();

        $name = $request->input('name');
        $email = $request->input('email');
        $contactNumber = $request->input('contact_number');
        $address = $request->input('address');
        $tinNumber = $request->input('tin_number');
        $note = $request->input('note');


        $supplier = Supplier::create([
            'name' => $name,
            'email' => $email,
            'contact_number' => $contactNumber,
            'address' => $address,
            'tin_number' => $tinNumber,
            'note' => $note,
            'status' => 'activate',
            'created_by' => auth()->id(),
        ]);

        if ($supplier->save()) {
            return response()->json('Success Operation', 201);
        }
        return response()->json('Failed Operation');
    }

    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $request->validated();

        $name = $request->input('name');
        $email = $request->input('email');
        $contactNumber = $request->input('contact_number');
        $address = $request->input('address');
        $tinNumber = $request->input('tin_number');
        $status = $request->input('status');
        $note = $request->input('note');


        $supplier->update([
            'name' => $name,
            'email' => $email,
            'contact_number' => $contactNumber,
            'address' => $address,
            'tin_number' => $tinNumber,
            'status' => $status,
            'note' => $note,
        ]);

        if ($supplier->save()) {
            return response()->json('Update Success', 201);
        }
        return response()->json('Update Failed');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->update([
            'status' => 'deactivate'
        ]);
        if ($supplier->save()) {
            return response()->json('Delete Success');
        }
        return response()->json('Delete Failed');
    }
}
