<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UploaderController extends Controller
{
    public function itemImg(Request $request){
        if(!$request->hasFile('file')){
            echo "hasfile";
        }
        $img = $request->file('file');

        $path = $img->store(date('Ymd'),'item_img');
        if($img->isValid()) {
            $ret["url"] = config('filesystems.disks.item_img')['url'] . '/' . $path;
            $ret["state"] = 'SUCCESS';
            echo json_encode($ret);
        }
    }

    public function itemContent(Request $request){
        if(!$request->hasFile('upfile')){
            echo "hasfile";
        }
        $img = $request->file('upfile');
        $path = $img->store(date('Ymd'),'item_content');
        if($img->isValid()){
            $ret["originalName"] = $img->getClientOriginalName();
            $ret["name"] = $path ;
            $ret["url"] = config('filesystems.disks.item_content')['url'] . '/' .$path ;
            $ret["size"] = $img->getClientSize();
            $ret["type"] = $img->getClientOriginalExtension();
            $ret["state"] = 'SUCCESS';
            echo json_encode($ret);
        }
    }
}
