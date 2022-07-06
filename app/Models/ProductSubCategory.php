<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }
}
