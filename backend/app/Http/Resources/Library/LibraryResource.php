<?php

namespace App\Http\Resources\Library;

use Illuminate\Http\Resources\Json\JsonResource;

class LibraryResource extends JsonResource
{
    /**
     * リソースを配列に変換
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->uuid,
                'attributes' => [
                    'name' => $this->name,
                    'location' => $this->location,
                    'code' => $this->code,
                ]
            ]
        ];
    }
}
