<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'cate_id' => $this->cate_id,
            'user_id' => $this->user_id,
            'cate_name' => $this->cate_name,
            'cate_img' => $this->cate_img,
            'cate_description' => $this->cate_description,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status,
            'view' => $this->view
        ];
    }
}
