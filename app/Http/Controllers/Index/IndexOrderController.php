<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\IndexUserAddress;
use App\Http\Model\IndexUserCart;
use App\Http\Model\OrderDetail;
use App\Http\Model\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexOrderController extends IndexCommonController
{
    public function addOrder(Request $request){
        $apply_status = $this->userApplyCheck();
        if($apply_status == 1)
            returnJson(0,'审核中，请等待审核通过');
        else if($apply_status == 0)
            returnJson(0,'请先进行 免押金申请',['url'=>'userApply']);
        else{
            $address_id = $request->input('address_id');
            $address_info = IndexUserAddress::find($address_id);
            if(!$address_info){
                returnJson(0,'地址为空，请及时填写收货地址',['url'=>'userCenterAddress']);
            }
            else{
                DB::beginTransaction();
                //购物车货入库到订单明细表
                $res1 = OrderDetail::addOrderDetail();
                //清理购物车
                $res2 = IndexUserCart::cleanCart();
                //新建订单
                $res3 = OrderList::addOrder($res1,$address_info);
                if($res1 && $res2 && $res3 ){
                    DB::commit();
                    returnJson(1,'成功');
                }
                else{
                    DB::rollBack();
                    returnJson(0,'失败');
                }
            }
        }
    }

    //取消订单
    public function cancleOrder(Request $request){
        $id = $request->input('id',0);
        if($id>=0){
            $user_id = session()->get('user_id');
            $res = OrderList::where('id',$id)->where('user_id',$user_id)->where('order_status',1)->update(['order_status'=>2]);
            if($res)
                returnJson(1,'成功');
            else
                returnJson(0,'失败');
        }
    }

    //用户合同单页
    public function userOrderDoc(Request $request){

        $id = $request->input('id',0);
        $info = OrderList::getOrderAdminDetail($id);
        $total_month = 0; //租赁最大月份
        $total_comp_num = 0;  //租赁总台数
        $isNew = '全新'; //是否是全新设备
        $dep_start = date('Y-m-d H:i:s');  //租赁开始时间
        $deposit = 0; //押金合计
        $dep_day = 1; //付租金日
        $dep_pay = 0; //需要付租金 多钱
        $address = ''; //地址
        $comp_list = []; //电脑明细
        $month_total_dep_price = 0; //月租合计
        $total_dep_price = 0; //租金总额
        $user_name = ''; //用户名称

            $address = $info->address;
            $created_at = $info->created_at;
            foreach($info['detail'] as $vo){
                if($total_month < $vo->rent_month){
                    $total_month = $vo->rent_month;
                }
                $total_comp_num += $vo->rent_num;
                if($dep_start > $vo->start_time){
                    $dep_start = $vo->start_time;
                }
                $deposit += $vo->item_price;
                $dep_pay += $vo->item_rent_price * $vo->rent_num;

                $comp_list_detail['name'] = $vo->item_name;
                $comp_list_detail['num'] = $vo->rent_num;
                $comp_list_detail['price'] = $vo->month_rent_price;
                $comp_list_detail['item_price'] = $vo->item_price;
                array_push($comp_list,$comp_list_detail);

                $month_total_dep_price = $dep_pay;
                $total_dep_price = $vo->item_rent_price * $vo->rent_num * $vo->rent_month;
            }
        //格式为时间戳
        $dep_end = date('Y-m-d H:i:s',strtotime("+$total_month month"));  //租赁结束时间 开始时间+加最大月数量

        $this->getDocTable($total_month,$total_comp_num,$isNew,$dep_start,$dep_end,$deposit,$dep_day,$dep_pay,$address,$comp_list,$month_total_dep_price,$total_dep_price,$user_name,$created_at);
    }
}
