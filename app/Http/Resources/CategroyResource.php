<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategroyResource extends JsonResource
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
            'category_id' => $this->category_id,
            'category_name' => $this->category_name,
            'category_Image' => asset($this->image),
            'category_products' => ProductResource::collection($this->Products),
            'category_added_at' => $this->created_at,
        ];
    }
}
