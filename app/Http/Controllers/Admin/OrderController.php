<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public $menu_id = 7;

    public function index(){
        if(authCheck($this->menu_id,__FUNCTION__)) {
            $list = OrderList::getOrderWithUser();
            returnJson(1, '获取成功', ['list' => $list]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }

    public function edit($id){
        if(authCheck($this->menu_id,__FUNCTION__)){
            $detail = OrderList::getOrderAdminDetail($id);
            returnJson(1,'获取成功',['detail'=>$detail]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }
    public function update(Request $request,$id){
        //参数验证
        $rules = [
            'order_status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = OrderList::updateOrder($id,$data);
                if($res!==false)
                    returnJson(1,'更新成功');
                else
                    returnJson(0,'更新失败');
            }
            else{
                returnJson(0,'权限不足');
            }
        }
    }
}
