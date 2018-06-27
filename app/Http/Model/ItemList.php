<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemList extends Model
{
    public static function getInfo(){
        $self_conn = new self;
        $class_conn = new ItemClass;
        $self_table_name = $self_conn->getTable();
        $class_table_name = $class_conn->getTable();
        $res = $self_conn->from("$self_table_name as i")
                     ->leftJoin("$class_table_name as c",'i.item_class','c.id')
                     ->select('i.*','c.class_name')
                     ->get();

        return $res;
    }

    public static function getItem($c_id=0,$id=0,$page=0){
        $res = self::where('is_show',1);
        $class_id_list = [];
        if($c_id){
            $class_id_list[] = $c_id;
            //把子目录也带上
            $p_id_list = ItemClass::where('pid',$c_id)->get();
            if($p_id_list)
                foreach($p_id_list as $key=>$vo){
                    $class_id_list[]=$vo['id'];
                }

            $res = $res->whereIn('item_class',$class_id_list);
        }
        if($page) $res->limit($page);
        if($id){
            $res->where('id',$id);
            $res = $res->first();
        }
        else
            $res = $res->get();
        return $res;
    }


    public static function insertItem($data){
        $insert = [
            'item_name'=>$data['item_name'],
            'item_class'=>$data['item_class'],
            'item_price'=>$data['item_price'],
            'item_avatar'=>$data['item_avatar'],
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
            'item_avatar'=>$data['item_avatar'],
            'item_rent_price'=>$data['item_rent_price'],
            'item_detail'=>$data['detail'],
            'item_parame'=>$data['parame'],
            'is_show'=>$data['is_show'],
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        DB::beginTransaction();
        $res1 = self::where('id',$id)->update($update);
        if(isset($data['item_img'])){
            if(ItemImg::where('item_id',$id)->count())
                $res2 = ItemImg::where('item_id',$id)->delete();
            else
                $res2 = 1;
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
