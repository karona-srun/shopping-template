<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ProductSubCategory extends Model
{
    use HasFactory, UUID;

    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
}
