<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'cate_id' => $this->cate_id,
            'port_id' => $this->port_id,
            'product_name' => $this->product_name,
            'product_img' => $this->product_img,
            'product_img_hover' => $this->product_img_hover,
            'product_quantity' => $this->product_quantity,
            'product_price' => $this->product_price,
            'product_description' => $this->product_description,
            'product_keyword' => $this->product_keyword,
            'status' => $this->status,
            'view' => $this->view,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
