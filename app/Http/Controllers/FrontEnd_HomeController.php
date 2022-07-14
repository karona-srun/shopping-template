<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class FrontEnd_HomeController extends Controller
{
    public function home()
    {
        $products = Product::Orderby('created_at','desc')->get();
        $productCategory = ProductCategory::Orderby('name_kh','desc')->get();
        $productSubCategory = ProductSubCategory::Orderby('name_kh','desc')->get();
        return response()->json(['productCategory'=>$productCategory,'productSubCategory'=>$productSubCategory,'products'=>$products]);
    }
}
