<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'id' => $this->id,
            'name_kh' => $this->name_kh,
            'name_en' => $this->name_en,
            'status' => $this->status,
            'subcategory' => $this->ProductSubCategory,
            'created_at' => $this->created_at->format('jS F Y h:i:s A'),
            'updated_at' => $this->updated_at->format('jS F Y h:i:s A')
        ];
    }
}
