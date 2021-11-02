<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'article_id' => $this->article_id,
            'user_id' => $this->user_id,
            'article_name' => $this->article_name,
            'article_description' => $this->article_description,
            'article_img' => $this->article_img,
            'article_detail' => $this->article_detail,
            'article_keyword' => $this->article_keyword,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status,
            'view' => $this->view
        ];
    }
}
