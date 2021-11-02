<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_id' => $this->comment_id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'article_id' => $this->article_id,
            'rate' => $this->rate,
            'role' => $this->role,
            'comment_description' => $this->comment_description,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status
        ];
    }
}
