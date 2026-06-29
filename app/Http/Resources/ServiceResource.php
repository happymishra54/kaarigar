<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug,

            'description' => $this->description,

            'price' => $this->price,

            'image' => $this->image,

            'category' => $this->category?->name,

            'worker' => [

                'id' => $this->worker->id,

                'name' => $this->worker->name,

                'phone' => $this->worker->phone,

                'city' => $this->worker->city,

                'profile_image' => $this->worker->profile_image,

            ]

        ];
    }
}