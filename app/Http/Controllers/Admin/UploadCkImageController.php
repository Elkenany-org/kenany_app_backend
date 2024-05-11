<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadCkImageController extends Controller
{

    public function uploadImage(Request $request){
        $fileName = $request->file('upload')->hashName();
        $allowed_extension = array("jpg" , "jpeg" , "gif", "png", "svg");
        $function_number = $_GET['CKEditorFuncNum'];
        if(in_array($request->file('upload')->extension(), $allowed_extension))
        {
            $request->file('upload')->move(storage_path('app/public'), $fileName);
            $url = asset('storage/' . $fileName);
            $message = '';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }else{
            $message = 'Image extension Not IN => "jpg" , "jpeg" , "gif", "png", "svg"';
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '', '$message');</script>";
        }
    }

}
