<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ItemImg extends Model
{
    public static function insertImg($item_id,$imgs){
        if(empty($imgs))
            return true;
        else{
            $return = true;
            $img_list = explode(',',rtrim($imgs,','));
            foreach($img_list as $vo){
                $status = self::insert([
                    'item_id'=>$item_id,
                    'img_url'=>$vo
                ]);
                if(!$status)
                    $return = false;
            }
            return $return;
        }
    }

    public static function getImgList($id){
        return self::where('item_id',$id)->get();
    }

    public static function deleteImg($id,$url){
        return self::where('item_id',$id)->where('img_url',$url)->delete();
    }
}
