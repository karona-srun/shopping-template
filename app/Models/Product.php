<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Product extends Model
{
    use HasFactory, UUID;

    protected $appends = ['path'];

    public function getPathAttribute()
    {
        return asset($this->thumbnail);
    }

    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function ProductSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class,'sub_category_id');
    }
}
