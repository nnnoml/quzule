<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemList extends Model
{
    public static function insertItem($data){
        $insert = [
            'item_name'=>$data['item_name'],
            'item_price'=>$data['item_price'],
            'item_rent_price'=>$data['item_rent_price'],
            'item_detail'=>$data['detail'],
            'item_parame'=>$data['parame'],
            'is_show'=>$data['is_show'],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::beginTransaction();
        $item_id = self::insertGetId($insert);
        $item_img = itemImg::insertImg($item_id,$data['item_img']);
        if($item_id && $item_img){
            DB::commit();
            return true;
        }
        else{
            DB::rollBack();
            return false;
        }
    }
    public static function updateItem($id,$data){
        $update = [
            'item_name'=>$data['item_name'],
            'item_price'=>$data['item_price'],
            'item_rent_price'=>$data['item_rent_price'],
            'item_detail'=>$data['detail'],
            'item_parame'=>$data['parame'],
            'is_show'=>$data['is_show'],
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::beginTransaction();
        $res1 = self::where('id',$id)->update($update);
        $res2 = ItemImg::where('item_id',$id)->delete();
        $res3 = itemImg::insertImg($id,$data['item_img']);
        if($res1 && $res2 && $res3){
            DB::commit();
            return true;
        }
        else{
            DB::rollBack();
            return false;
        }
    }

    public static function deleteItem($id){
        DB::beginTransaction();
        $res1 = self::where('id',$id)->delete();
        $res2 = ItemImg::where('item_id',$id)->delete();
        if($res1 && $res2){
            DB::commit();
            return true;
        }
        else{
            DB::rollBack();
            return false;
        }
    }

}
