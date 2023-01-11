<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_name' => 'string|required',
            'customer_contact' => 'numeric|required',
            'ic_number' => 'string|required',
            'email' => 'string|unique:customers|required',
//            'avatar' => 'string',
//            'note' => 'string',
//            'status' => 'string',
            'customer_group_id' => 'numeric|required',
        ];
    }
}
