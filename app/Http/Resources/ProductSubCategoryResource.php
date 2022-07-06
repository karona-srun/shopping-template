<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSubCategoryResource extends JsonResource
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
            'category_name' => $this->ProductCategory->name_kh,
            'name_kh' => $this->name_kh,
            'name_en' => $this->name_en,    
            'status' => $this->status,
            'created_at' => $this->created_at->format('jS F Y h:i:s A'),
            'updated_at' => $this->updated_at->format('jS F Y h:i:s A')
        ];
    }
}
