<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCategoryResource;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductCategoryResource::collection(ProductCategory::orderBy('updated_at','DESC')->get());
        return response()->json(['data' => $data]);
    }


    public function getListCategory()
    {
        $data = ListCategoryResource::collection( ProductCategory::orderBy('updated_at','DESC')->get());
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name_kh = $request->name_kh;
        $productCategory->name_en = $request->name_en;
        $productCategory->status = $request->status;
        $productCategory->created_by = 1;
        $productCategory->updated_by = 1;
        $productCategory->save();
        return response()->json([
            'message' => 'Product category has been created successfully.',
            'data' => $productCategory
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productCategory = ProductCategory::find($id);
        return response()->json([
            'message' => 'Product category has been shown successfully.',
            'data' => $productCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        return response()->json([
            'message' => 'Product category has been edited successfully.',
            'data' => $productCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $productCategory = ProductCategory::find($request->id);
        $productCategory->name_kh = $request->name_kh;
        $productCategory->name_en = $request->name_en;
        $productCategory->status = $request->status;
        $productCategory->updated_by = 1;
        $productCategory->save();
        return response()->json([
            'message' => 'Product category has been updated successfully.',
            'data' => $productCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
        return response()->json([
            'message' => 'Product category has been deleted successfully.',
            'data' => $productCategory
        ]);
    }
}
