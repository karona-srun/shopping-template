<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category' => $this->ProductCategory->name_kh,
            'sub_category' => $this->ProductSubCategory->name_kh,
            'title_en' => $this->title_en,
            'title_kh' => $this->title_kh,
            'content_en' => $this->content_en,
            'content_kh' => $this->content_kh,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'qty' => $this->qty,
            'rate' => $this->rate,
            'promote' => $this->promote,
            'thumbnail' => $this->thumbnail,
            'attachments' => $this->Attachment,
            'path' => $this->path,
            'status' => $this->status == 1 ? 'សកម្ម' : 'អសកម្ម',
            'created_at' => $this->created_at->format('jS F Y h:i:s A'),
            'updated_at' => $this->updated_at->format('jS F Y h:i:s A')
        ];
    }
}
