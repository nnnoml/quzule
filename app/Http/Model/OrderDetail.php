<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $table = 'order_detail';

    //添加订单明细
    public static function addOrderDetail(){
        $item_list = IndexUserCart::getItem();
        if($item_list) {
            $id_list = '';
            foreach ($item_list as $key => $vo) {
                $insert = [
                    'item_id'=>$vo->item_id,
                    'start_time'=>$vo->start_time,
                    'rent_month'=>$vo->rent_month,
                    'rent_num'=>$vo->rent_num,
                    'month_rent_price'=>$vo->rent_num * $vo->item_rent_price,
                ];
                $res = self::insertGetId($insert);
                if($res)
                    $id_list .= $res.',';
                else return false;
            }
            return rtrim($id_list,',');
        }
        else return false;
    }
}
