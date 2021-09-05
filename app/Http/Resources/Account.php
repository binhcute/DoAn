<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Account extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'username' => $this->username,
            'avatar' => $this->avatar,
            'gender' => $this->gender,
            'phone' => $this-> phone,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $this->password,
            'level' => $this->level,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'status' => $this->status
        ];
    }
}
