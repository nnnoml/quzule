<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\IndexUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\IndexApply;

use Illuminate\Support\Facades\DB;
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
                DB::beginTransaction();
                $res1 = IndexApply::updateApply($id,$data);

                //审核通过
                if($data['check_status'] == 1)
                    $apply_status = 2;
                //驳回
                else if($data['check_status'] == 2)
                    $apply_status = 0;
                //通过但需要完善
                else if($data['check_status'] == 3)
                    $apply_status = 3;
                //用户id
                $user_id = IndexApply::where('id',$id)->value('user_id');

                $res2 = IndexUsers::where('id',$user_id)->update(['apply_status'=>$apply_status]);
                if($res1 && $res2){
                    DB::commit();
                    returnJson(1,'更新成功');
                }
                else{
                    DB::rollBack();
                    returnJson(0,'更新失败');
                }
            }
            else{
                returnJson(0,'权限不足');
            }
        }
    }
}
