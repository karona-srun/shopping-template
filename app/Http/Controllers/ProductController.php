<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductResource::collection(Product::orderBy('updated_at','DESC')->get());
        return response()->json($data);
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
        $validator = Validator::make($request->all(), [
            'category' => ['required'],
            'sub_category' => ['required'],
            'title_en' => ['required'],
            'title_kh' => ['required'],
            'rate' => ['required'],
            'content_en' => ['required'],
            'content_kh' => ['required'],
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Product has been failed.',
                'success' => false,
                'msg' => $validator->errors()
            ]);
        }
        $filePath = null;
        if($request->file('file')){
            $file = $request->file('file');
            $path = "product/tumbnail/";
            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $filePath = 'storage/'.$path . $fileName;
        }

        $product = new Product();
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->title_kh = $request->title_kh;
        $product->title_en = $request->title_en;
        $product->content_kh = $request->content_kh;
        $product->content_en = $request->content_en;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->qty = $request->qty;
        $product->rate = $request->rate;
        $product->promote = $request->promote;
        $product->status = 1;
        $product->thumbnail = $filePath;
        $product->created_by = 1;
        $product->updated_by = 1;
        $product->save();

        return response()->json([
            'message' => 'Product has been created successfully.',
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductResource::make(Product::find($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => ['required'],
            'sub_category' => ['required'],
            'title_en' => ['required'],
            'title_kh' => ['required'],
            'rate' => ['required'],
            'content_en' => ['required'],
            'content_kh' => ['required'],
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Product has been failed.',
                'success' => false,
                'msg' => $validator->errors()
            ]);
        }
        $product = Product::find($id);
        $filePath = null;
        if($request->file('file')){
            if($product->thumbnail){
                unlink($product->thumbnail);
            }
            $file = $request->file('file');
            $path = "product/tumbnail/";
            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $filePath = 'storage/'.$path . $fileName;
            $product->thumbnail = $filePath;
        }

        
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->title_kh = $request->title_kh;
        $product->title_en = $request->title_en;
        $product->content_kh = $request->content_kh;
        $product->content_en = $request->content_en;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->qty = $request->qty;
        $product->rate = $request->rate;
        $product->promote = $request->promote;
        $product->status = 1;
        $product->created_by = 1;
        $product->updated_by = 1;
        $product->save();

        return response()->json([
            'message' => 'Product has been updated successfully.',
            'success' => true,
            'data' => $product
        ]);
    }

    public function updateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => ['required'],
            'sub_category' => ['required'],
            'title_en' => ['required'],
            'title_kh' => ['required'],
            'rate' => ['required'],
            'content_en' => ['required'],
            'content_kh' => ['required'],
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Product has been failed.',
                'success' => false,
                'msg' => $validator->errors()
            ]);
        }
        $product = Product::find($request->id);
        $filePath = null;
        if($request->file('file')){
            if($product->thumbnail){
                unlink($product->thumbnail);
            }
            $file = $request->file('file');
            $path = "product/tumbnail/";
            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name = $file->getClientOriginalName();
            $file_type = $file->getClientOriginalExtension();
            $filePath = 'storage/'.$path . $fileName;
            $product->thumbnail = $filePath;
        }

        
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->title_kh = $request->title_kh;
        $product->title_en = $request->title_en;
        $product->content_kh = $request->content_kh;
        $product->content_en = $request->content_en;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->qty = $request->qty;
        $product->rate = $request->rate;
        $product->promote = $request->promote;
        $product->status = 1;
        $product->created_by = 1;
        $product->updated_by = 1;
        $product->save();

        return response()->json([
            'message' => 'Product has been updated successfully.',
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return response()->json($data);
    }
}
