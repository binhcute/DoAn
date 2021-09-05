<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product;

class Portfolio extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'port_id' => $this->port_id,
            'user_id' => $this->user_id,
            'port_name' => $this->port_name,
            'port_avatar' => $this->port_avatar,
            'port_img' => $this->port_img,
            'port_origin' => $this->port_origin,
            'port_description' => $this->port_description,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status,
            'products' => Product::collection($this->whenLoaded('products'))
        ];
    }
}
