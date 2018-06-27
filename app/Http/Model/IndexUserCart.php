<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class IndexUserCart extends Model
{
    public $timestamps = false;
    protected $table = 'index_user_cart';

    //添加到购物车
    public static function insertCart($data){
        $user_id  = session()->get('user_id');
        return self::insert([
                    'user_id' => $user_id,
                    'item_id' => $data['item_id'],
                    'start_time' => $data['start_time'],
                    'rent_month' => $data['rent_month'],
                    'rent_num' => $data['rent_num'],
                    'created_at'=>date('Y-m-d H:i:s')
                ]);
    }

    //购物车列表
    public static function getItem(){
        $user_id  = session()->get('user_id');
        $self_conn = new self;
        $item_conn = new ItemList();
        $self_table_name = $self_conn->getTable();
        $item_table_name = $item_conn->getTable();
        $res = $self_conn->from("$self_table_name as c")
            ->leftJoin("$item_table_name as i",'c.item_id','i.id')
            ->where('c.user_id',$user_id)
            ->where('i.is_show',1)
            ->select('c.*','i.item_name','i.item_class','i.item_price','i.item_rent_price','i.item_avatar')
            ->orderBy('c.id','asc')
            ->get();

        return $res;
    }

    //删除购物车商品
    public static function deleteCart($id){
        return self::where('id',$id)->delete();
    }

    //清理购物车
    public static function cleanCart(){
        $user_id  = session()->get('user_id');
        return self::where('user_id',$user_id)->delete();
    }
}
