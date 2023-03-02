<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
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
            'userid' => $this->id,
            'username' => $this->username,
            'token' => $this->createToken('auth_token')->plainTextToken,
            'pets' => new kedvencResource($this->UsersPets)
        ];
    }
}