<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_kh',
        'name_en',
        'status',
        'created_by',
        'updated_by'
    ];

    public function ProductSubCategory()
    {
        return $this->hasMany(ProductSubCategory::class);
    }
}
