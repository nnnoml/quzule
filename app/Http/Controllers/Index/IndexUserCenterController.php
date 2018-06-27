<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\IndexUserAddress;
use App\Http\Model\OrderList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
//用户中心
class IndexUserCenterController extends IndexCommonController
{
    //订单管理
    public function order(){
        $return_info = $this->return_info;
        $return_info['title'] = '个人中心|订单列表';
        $return_info['order_list'] = OrderList::getOrder();
        return view('user.user_center_order',$return_info);
    }

    //地址管理
    public function address(){
        $return_info = $this->return_info;
        $return_info['title'] = '个人中心|地址管理';
        $return_info['address_list'] = IndexUserAddress::getAddressList();
        return view('user.user_center_address',$return_info);
    }

    //保存地址
    public function store(Request $request){
        //参数验证
        $rules = [
            'address' => 'required',
            'name' => 'required',
            'tel'  => 'required|regex:/^1\d{10}$/',
        ];
        $messages = [
            'address.required' => '请填写地址',
            'name.required' => '请填写收件人名称',
            'tel.required' => '请填写手机号',
            'tel.regex' => '手机号码错误',
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
        else{
            $data = $request->all();
            $res = IndexUserAddress::insert(['user_id'=>$this->user_info['user_id'],'address'=>$data['address'],'user_name'=>$data['name'],'user_tel'=>$data['tel']]);
            if($res)
                returnJson(1,'成功');
            else
                returnJson(0,'失败 请重试');
        }
    }

    public function update(Request $request,$id){
        if($id<=0) returnJson(0,'id错误');
        else{
            //参数验证
            $rules = [
                'address' => 'required',
                'name' => 'required',
                'tel'  => 'required|regex:/^1\d{10}$/',
            ];
            $messages = [
                'address.required' => '请填写地址',
                'name.required' => '请填写收件人名称',
                'tel.required' => '请填写手机号',
                'tel.regex' => '手机号码错误',
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
            else{
                $data = $request->all();
                $res = IndexUserAddress::where('id',$id)->update(['address'=>$data['address'],'user_name'=>$data['name'],'user_tel'=>$data['tel']]);
                if($res)
                    returnJson(1,'成功');
                else
                    returnJson(0,'失败 请重试');
            }
        }
    }

    public function destroy($id){
        $res = IndexUserAddress::where('id',$id)->delete();
        if($res)
            returnJson(1,'成功');
        else
            returnJson(0,'失败');
    }
}
