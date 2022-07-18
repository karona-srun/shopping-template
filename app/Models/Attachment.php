<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Attachment extends Model
{
    use HasFactory, UUID;
    
    protected $appends = ['path'];

    public function getPathAttribute()
    {
        return asset($this->file);
    }

    public function Product()
    {
    	return $this->belongsTo(Product::class,'id');
    }
}
