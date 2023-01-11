<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'address' => $this->address,
            'tin_number' => $this->tin_number,
            'note' => $this->note,
            'status' => $this->status,
        ];
    }
}
