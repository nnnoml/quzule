<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\AdminUsers;
use App\Http\Model\AdminRoleUsers;
use App\Http\Model\AdminMenu;

use Illuminate\Support\Facades\Validator;
class AdminUserController extends Controller
{
    //登录
    public function login(Request $request){
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
            $user_info = AdminUsers::getUserInfo($data['user_name']);
            if(!$user_info)
                returnJson(0,'用户不存在');
            else{
                //密码相同
                if(password_verify($data['password'],$user_info->password)){
                    //取用户权限
                    $auth_list = AdminRoleUsers::authList($user_info->id);
                    if(empty($auth_list)) returnJson(0,'用户权限异常');
                    else{
                        session()->put('user_auth',json_encode($auth_list));
                        session()->put('user_id',$user_info->id);
                        returnJson(1,'成功');
                    }
                }
                else{
                    returnJson(0,'登录失败 帐号或密码错误');
                }
            }
        }
    }

    //登出
    public function loginOut(){
        session()->forget('user_id');
        session()->forget('user_auth');
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

    //获取菜单
    public function menu(){
        $auth = session()->get('user_auth');
        if(empty($auth))
            returnJson(0,'权限有误，请重新登录');
        else{
            $auth = json_decode($auth,true);
            $menu_list = AdminMenu::getMenuList($auth);
            returnJson(1,'获取成功',['list'=>$menu_list]);
        }
    }
}
