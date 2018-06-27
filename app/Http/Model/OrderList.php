<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    public $timestamps = false;
    protected $table = 'order_list';

    //添加订单
    public static function addOrder($detail_id_list,$address_info){
        $user_id = session()->get('user_id');
        $order_id = uniqid($user_id).mt_rand(100,999);
        return self::insert([
            'user_id'=>$user_id,
            'order_id'=>$order_id,
            'order_detail'=>$detail_id_list,
            'order_status'=>1,
            'address'=>$address_info->address.' '.$address_info->user_name.' '.$address_info->user_tel,
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }

    //获取订单信息
    public static function getOrder(){
        $user_id = session()->get('user_id');

        $detail = new OrderDetail();
        $item =  new ItemList();
        $detail_table_name = $detail->getTable();
        $item_table_name = $item->getTable();

        $order_list = self::where('user_id',$user_id)->where('order_status','<>',2)->get();
        if($order_list){
            foreach($order_list as $key=>$vo){
                $order_list[$key]['detail'] = $detail->from("$detail_table_name as d")
                        ->leftJoin("$item_table_name as i",'d.item_id','i.id')
                        ->select('d.*','i.item_name','i.item_class','i.item_price','i.item_rent_price','i.item_avatar')
                        ->whereIn('d.id',explode(',',$vo->order_detail))
                        ->get();
            }
        }
        return $order_list;
    }

    //获取订单详细信息
    public static function getOrderDetail($id){
        $user_id = session()->get('user_id');
        $detail = new OrderDetail();
        $item =  new ItemList();
        $detail_table_name = $detail->getTable();
        $item_table_name = $item->getTable();

        $order_info = self::where('user_id',$user_id)->where('order_status',1)->where('id',$id)->first();
        if($order_info)
            $order_info['detail'] = $detail->from("$detail_table_name as d")
                ->leftJoin("$item_table_name as i",'d.item_id','i.id')
                ->select('d.*','i.item_name','i.item_class','i.item_price','i.item_rent_price','i.item_avatar')
                ->whereIn('d.id',explode(',',$order_info->order_detail))
                ->get();

        if($order_info)
            return $order_info;
        else
            return '';
    }

    //获取订单信息 后端 额外获取用户id
    public static function getOrderWithUser(){
        $order = new self();
        $user =  new IndexUsers();
        $order_table_name = $order->getTable();
        $user_table_name = $user->getTable();

        return $order->from("$order_table_name as o")
            ->leftJoin("$user_table_name as u",'o.user_id','u.id')
            ->select('o.*','u.user_name')
            ->get();

    }

    //获取订单详细信息 后端
    public static function getOrderAdminDetail($id){

        $detail = new OrderDetail();
        $item =  new ItemList();
        $detail_table_name = $detail->getTable();
        $item_table_name = $item->getTable();

        $order_info = self::where('id',$id)->first();
        if($order_info)
            $order_info['detail'] = $detail->from("$detail_table_name as d")
                ->leftJoin("$item_table_name as i",'d.item_id','i.id')
                ->select('d.*','i.item_name','i.item_class','i.item_price','i.item_rent_price','i.item_avatar')
                ->whereIn('d.id',explode(',',$order_info->order_detail))
                ->get();

        if($order_info)
            return $order_info;
        else
            return '';
    }

    public static function updateOrder($id,$data){
        return self::where('id',$id)->update(['order_status'=>$data['order_status']]);
    }
}
