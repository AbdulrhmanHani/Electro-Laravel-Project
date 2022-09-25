<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->name,
            'product_description' => $this->description,
            'product_price' => $this->price,
            'product_price_after_sale' => $this->price_after_sale,
            'product_qty' => $this->qty,
            'product_images' => $this->Images,
            'product_category' => $this->Category->category_name,
            'product_added_at' => $this->created_at,
        ];
    }
}
