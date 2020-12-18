<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function make(Request $request){
        $fileName=$this->move($request->file('file'));
        return ['code'=>0,
            'file'=>$fileName];

    }

    public function simditor(Request $request){
    $fileName=$this->move($request->file('file'));
        return ['success'=>true,
            'msg'=>'上传成功',
            'file_path'=>$fileName];
    }

    public function move($file){

        $fileName=str_random(5).'.'.$file->getClientOriginalExtension();
        $dir='uploads/'.date('Ym/d');
        $file->move($dir,$fileName);
        return url($dir.'/'.$fileName);
    }
}
