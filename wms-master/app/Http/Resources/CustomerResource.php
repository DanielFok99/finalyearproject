<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'customer_name' => $this->customer_name,
            'customer_contact' => $this->customer_contact,
            'ic_number' => $this->ic_number,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'note' => $this->note,
            'status' => $this->status,
            'customer_group_id' => $this->customer_group_id,
            'customer_group_name' => $this->customerGroup->title,

        ];
    }
}
