<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Models\Staff;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function index()
    {
        return response()->json(Warehouse::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'address' => 'string|required',
            'is_default' => 'boolean|required',
            'contact_number' => 'string|required',
            'person_in_charge_id' => 'int|required',
        ]);

        $name = $request->input('name');
        $address = $request->input('address');
        $isDefault = $request->input('is_default');
        $contactNumber = $request->input('contact_number');
        $personInChargeId = $request->input('person_in_charge_id');

        $personInCharge = Staff::query()->findOrFail($personInChargeId);

        $warehouse = Warehouse::create([
            'name' => $name,
            'address' => $address,
            'is_default' => $isDefault,
            'contact_number' => $contactNumber,
            'person_in_charge_id' => $personInChargeId,
        ]);

        if ($warehouse->save()) {
            return response()->json('Successful created');
        }
        return response()->json('Create Failed');
    }

    public function show(Warehouse $warehouse)
    {
        //
    }


    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        //
    }


    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
