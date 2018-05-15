<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Http\Model\ItemClass;

class ItemList extends Model
{
    public static function getList(){
        $self_conn = new self;
        $class_conn = new ItemClass;
        $self_table_name = $self_conn->getTable();
        $class_table_name = $class_conn->getTable();
         return $self_conn->from("$self_table_name as i")
                     ->leftJoin("$class_table_name as c",'i.item_class','c.id')
                     ->select('i.*','c.class_name')
                     ->get();
    }


    public static function insertItem($data){
        $insert = [
            'item_name'=>$data['item_name'],
            'item_class'=>$data['item_class'],
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
            'item_class'=>$data['item_class'],
            'item_price'=>$data['item_price'],
            'item_rent_price'=>$data['item_rent_price'],
            'item_detail'=>$data['detail'],
            'item_parame'=>$data['parame'],
            'is_show'=>$data['is_show'],
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::beginTransaction();
        $res1 = self::where('id',$id)->update($update);
        if(isset($data['item_img'])){
            $res2 = ItemImg::where('item_id',$id)->delete();
            $res3 = itemImg::insertImg($id,$data['item_img']);
        }
        else {
            $res2 = 1;
            $res3 = 1;
        }
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
