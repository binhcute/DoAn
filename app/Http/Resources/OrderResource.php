<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status,
            'note' => $this->note,
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }
}
