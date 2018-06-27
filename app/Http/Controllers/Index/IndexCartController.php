<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\IndexUserCart;
use Illuminate\Http\Request;
use App\Http\Model\IndexUserAddress;

use Illuminate\Support\Facades\Validator;
class IndexCartController extends IndexCommonController
{
    public function cart(){
        $return_info = $this->return_info;
        $return_info['title'] = '购物车';
        $return_info['cart_list'] = IndexUserCart::getItem();
        $return_info['address'] = $this->userAddress();
        $return_info['rent_num'] = 0; //总计出租数量
        $return_info['rent_pay'] = 0; //总计出租价格/月
        foreach($return_info['cart_list'] as $key=>$vo){
            $return_info['rent_num'] += $vo->rent_num;
            $return_info['rent_pay'] += $vo->item_rent_price * $vo->rent_num;
        }
        return view('cart.cart',$return_info);
    }

    //用户地址
    public function userAddress(){
        $user_id = session()->get('user_id');
        $address_list = IndexUserAddress::where('user_id',$user_id)->get();
        return $address_list;
    }

    public function addCart(Request $request){
        //参数验证
        $rules = [
            'item_id'=> 'numeric',
            'start_time' => 'required',
            'rent_month' => 'required|numeric',
            'rent_num'=>'required|numeric'
        ];
        $messages = [
            'item_id.required' => '商品id错误',
            'start_time.required' => '请选择开始时间',
            'rent_month.required' => '请选择租赁时长',
            'rent_num.required' => '请填写租赁数量',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $msg = $validator->errors()->messages();
            $ret_msg = '';
            foreach($msg as $key=>$vo){
                $ret_msg .= $vo[0].', ';
            }
            returnJson(0,rtrim($ret_msg,', '));
        }
        else {
            $data = $request->all();
            $res = IndexUserCart::insertCart($data);
            if($res)
                returnJson(1,'加入购物车成功');
            else
                returnJson(0,'加入购物车失败');
        }
    }

    public function deleteCart(Request $request){
        $id = $request->input('id',0);
        if($id<=0)
            returnJson(0,'参数错误 无法删除');
        else{
            $res = IndexUserCart::deleteCart($id);
            if($res)
                returnJson(1,'删除成功');
            else
                returnJson(0,'删除错误 请重试');
        }
    }
}
