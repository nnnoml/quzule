<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PageLists extends Model
{
    public static function insertPage($data){
        $insert = [
            'page_name'=>$data['page_name'],
            'page_detail'=>$data['detail'],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        $res = self::insert($insert);
        if($res)
            return true;
        else
            return false;
    }

    public static function updatePage($id,$data){
        $update = [
            'page_name'=>$data['page_name'],
            'page_detail'=>$data['detail'],
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        $res = self::where('id',$id)->update($update);
        if($res)
            return true;
        else
            return false;
    }

    public static function deletePage($id){
        $res = self::where('id',$id)->delete();
        if($res)
            return true;
        else
            return false;
    }

    public static function getList(){
        return self::select('page_name','id')->get();
    }
}
