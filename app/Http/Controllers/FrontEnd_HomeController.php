<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class FrontEnd_HomeController extends Controller
{
    /**
     * Function get all datas
     */
    public function home()
    {
        $products = Product::Orderby('created_at','desc')->get();
        $productCategory = ProductCategoryResource::collection(ProductCategory::Orderby('name_kh','desc')->get());
        $productSubCategory = ProductSubCategory::Orderby('name_kh','desc')->get();
        return response()->json(['productCategory'=>$productCategory,'productSubCategory'=>$productSubCategory,'products'=>$products]);
    }

    /**
     * Function get data by id
     */
    public function fetchData($id)
    {
        $product = ProductResource::make(Product::find($id));
        return response()->json($product);
    }

    /**
     * Function get data by id
     */
    public function fetchProductByCategory($id)
    {
        $products = ProductResource::collection(Product::where('category_id',$id)->get());
        $productCategory = ProductCategoryResource::collection(ProductCategory::Orderby('name_kh','desc')->get());
        return response()->json(['productCategory'=>$productCategory,'products'=>$products]);
    }

    /**
     * Function get data by id Sub Category
     */
    public function fetchProductbySubCategory($id)
    {
        $products = ProductResource::collection(Product::where('sub_category_id',$id)->get());
        $productCategory = ProductCategoryResource::collection(ProductCategory::Orderby('name_kh','desc')->get());
        return response()->json(['productCategory'=>$productCategory,'products'=>$products]);
    }
}
