<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListSubCategoryResource;
use App\Http\Resources\ProductSubCategoryResource;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductSubCategoryResource::collection(ProductSubCategory::orderBy('updated_at','DESC')->get());
        return response()->json(['data' => $data]);
    }

    public function getListSubCategory()
    {
        $data = ListSubCategoryResource::collection(ProductSubCategory::orderBy('updated_at','DESC')->get());
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productSubCategory = new ProductSubCategory();
        $productSubCategory->category_id = $request->category_id;
        $productSubCategory->name_kh = $request->name_kh;
        $productSubCategory->name_en = $request->name_en;
        $productSubCategory->status = $request->status;
        $productSubCategory->created_by = 1;
        $productSubCategory->updated_by = 1;
        $productSubCategory->save();
        return response()->json([
            'message' => 'Product sub category has been created successfully.',
            'data' => $productSubCategory
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $ProductSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        return response()->json([
            'message' => 'Product subcategory has been shown successfully.',
            'data' => $productSubCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $ProductSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        return response()->json([
            'message' => 'Product subcategory has been shown successfully.',
            'data' => $productSubCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubCategory  $ProductSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productSubCategory = ProductSubCategory::find($request->id);
        $productSubCategory->category_id = $request->category_id;
        $productSubCategory->name_kh = $request->name_kh;
        $productSubCategory->name_en = $request->name_en;
        $productSubCategory->status = $request->status;
        $productSubCategory->updated_by = 1;
        $productSubCategory->save();
        return response()->json([
            'message' => 'Product sub category has been updated successfully.',
            'data' => $productSubCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $ProductSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        $productSubCategory->delete();
        return response()->json([
            'message' => 'Product sub category has been deleted successfully.',
            'data' => $productSubCategory
        ]);
    }
}
