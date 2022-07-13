<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListAttachment(Request $request)
    {
        $attachment = Attachment::where(["attachment_id" => $request->id, "attachment_type" => $request->type])->get();
        return response()->json($attachment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filePath = null;
        if($request->file('file')){
            $file = $request->file('file');
            $path = "product/photos/";
            $fileName = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $filePath = 'storage/'.$path . $fileName;
        }else{
            return response()->json([
                'message' => 'Attachment has been failed.',
                'success' => false,
            ]);
        }

        $attachment = new Attachment();
        $attachment->attachment_id = $request->attachment_id;
        $attachment->attachment_type = 'product/photos';
        $attachment->file = $filePath;
        $attachment->save();

        return response()->json([
            'message' => 'Attachment has been created successfully.',
            'success' => true,
            'data' => $attachment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        $attachment = Attachment::find($attachment->id);
        if($attachment->file){
            unlink($attachment->file);
        }
        $attachment->delete();
        return response()->json($attachment);
    }
}
