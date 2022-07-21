<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $datas = [
            'productCategory' => ProductCategory::count(),
            'productSubCategory' => ProductSubCategory::count(),
            'product' => Product::count()
        ];
        return response()->json($datas);
    }
}
