<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'customer_name' => 'string',
            'customer_contact' => 'string',
            'ic_number' => 'string',
            'email' => 'string',
//            'avatar' => 'string',
//            'note' => 'string',
            'status' => 'string',
            'customer_group_id' => 'numeric',
//            'created_by' => 'numeric',
        ];
    }
}
