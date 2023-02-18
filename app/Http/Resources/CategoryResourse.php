<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name_uz' => $this->name_uz,
            'name_ru' => $this->name_uz,
            'slug' => $this->slug,
            'posts' => PostResourse::collection($this->posts),
        ];
    }
}
