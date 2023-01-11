<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;

class StaffController extends Controller
{

    public function index()
    {
        return response()->json();
    }

    public function store(StoreStaffRequest $request)
    {
        //
    }

    function show(Staff $staff)
    {
        //
    }


    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        //
    }

    public function destroy(Staff $staff)
    {
        //
    }
}
