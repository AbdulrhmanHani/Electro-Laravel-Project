<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            //      id     image_id     image_name     product_id     created_at
            'image_id' => $this->image_id,
            'image' => asset($this->image_name),
            'product' => new ProductResource($this->Product),
            'added_at' => $this->created_at
        ];
    }
}
