<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Model\IndexUsers;
use App\Http\Model\IndexApply;

use Illuminate\Support\Facades\Validator;
class IndexUserController extends IndexCommonController
{
    //登录界面
    public function login(){
        $return_info = $this->return_info;
        $return_info['nav'] = 'login';
        $return_info['title'] = '登录';
        return view('login.login',$return_info);
    }
    //登录操作
    public function loginDo(Request $request){
        //参数验证
        $rules = [
            'user_name' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //取用户数据
            $user_info = IndexUsers::getUserInfo($data['user_name']);
            if(!$user_info)
                returnJson(0,'用户不存在');
            else{
                //密码相同
                if(password_verify($data['password'],$user_info->password)){
                    session()->put('user_id',$user_info->id);
                    session()->put('user_name',$user_info->user_name);
                    returnJson(1,'成功');
                }
                else{
                    returnJson(0,'登录失败 帐号或密码错误');
                }
            }
        }
    }

    public function register(){
        $return_info = $this->return_info;
        $return_info['title'] = '注册';
        return view('login.register',$return_info);
    }

    //登出
    public function loginOut(){
        session()->forget('user_id');
        session()->forget('user_name');
        returnJson(1,'成功');
    }

    //修改密码
    public function changePwd(Request $request){

        //参数验证
        $rules = [
            'old_pwd' => 'required',
            'new_pwd1' => 'required',
            'new_pwd2' => 'required|same:new_pwd1',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $old_pwd = $request->input('old_pwd');
            $new_pwd1 = $request->input('new_pwd1');
            $user_id = session()->get('user_id');
            $res = AdminUsers::changePwd($user_id,$old_pwd,$new_pwd1);
            if($res === false)
                returnJson(0,'修改失败');
            else if ($res == 'old_pwd_error')
                returnJson(0,'修改失败 旧密码错误');
            else
                returnJson(1,'修改成功');
        }
    }

    //用户中心
    public function userCenter(){
        $return_info = $this->return_info;
        $return_info['title'] = '个人中心';
        return view('user.user_center',$return_info);
    }

    //用户提交申请
    public function userApply(){
        $return_info = $this->return_info;
        $return_info['nav'] = 'apply';
        $return_info['title'] = '提交申请';
        return view('user.user_apply',$return_info);
    }
    //申请入库
    public function userApplyDo(Request $request){
        //参数验证
        $messages = [
            'required' => ':attribute must be input.',
        ];

        $rules = [
            'comp_name' => 'required',
            'comp_reg_num' => 'required',
            'comp_reg_time' => 'required',
            'license_input' => 'required',
            'legal_person_name' => 'required',
            'legal_person_id' => 'required',
            'legal_person_card_front_input' => 'required',
            'legal_person_card_back_input' => 'required',
            'area_img_input' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //取用户数据
            $res = IndexApply::insertApply($data);
            if($res)
                returnJson(1,'成功');
            else
                returnJson(0,'提交失败');
        }
    }
}
