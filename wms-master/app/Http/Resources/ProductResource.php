<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_name' => $this->title,
            'brand_name' => $this->brand->name,
            'group_name' => $this->group->name,
            'remaining_stock' => 0,
        ];
    }
}
