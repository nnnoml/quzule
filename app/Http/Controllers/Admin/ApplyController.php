<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\IndexApply;

use Illuminate\Support\Facades\Validator;
class ApplyController extends Controller
{
    public $menu_id = 5;

    public function index(){
        if(authCheck($this->menu_id,__FUNCTION__)) {
            $list = IndexApply::getList();
            returnJson(1, '获取成功', ['list' => $list]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }

    public function edit($id){
        if(authCheck($this->menu_id,__FUNCTION__)){
            $data = IndexApply::getList($id);
            returnJson(1,'获取成功',['data'=>$data]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }

    public function update(Request $request,$id){
        //参数验证
        $rules = [
            'check_status' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = IndexApply::updateApply($id,$data);
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
