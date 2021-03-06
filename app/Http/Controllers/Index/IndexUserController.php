<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\LogSms;
use Illuminate\Http\Request;
use App\Http\Model\IndexUsers;
use App\Http\Model\IndexApply;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Qcloud\Sms\SmsSingleSender;

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
    //注册操作
    public function registerDo(Request $request){
        //参数验证
        $rules = [
            'tel' => 'required',
            'password' => 'required',
            'password2' => 'required',
            'code' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else if(!isTel($request->get('tel'))){
            returnJson(0,'手机号错误');
        }
        else if(strlen($request->get('password')) < 6){
            returnJson(0,'密码不少于6位');
        }
        else if($request->get('password') != $request->get('password2')){
            returnJson(0,'两次密码不一致');
        }
        else{
            $data = $request->all();
            //取用户数据
            $user_info = IndexUsers::getUserInfo($data['tel']);
            if($user_info)
                returnJson(0,'用户已存在');
            else if($data['code'] != session()->get('a'.$data['tel']))
                returnJson(0,'验证码错误');
            else{
                //密码相同
                $res = IndexUsers::insertDo($data);
                if($res){
                    session()->forget('a'.$data['tel']);
                    returnJson(1,'注册成功');
                }
                else
                    returnJson(0,'注册失败 请重试');
            }
        }
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

    //用户提交申请
    public function userApply(){
        $return_info = $this->return_info;
        $return_info['nav'] = 'apply';
        $return_info['title'] = '提交申请';

        $apply_status = $this->userApplyCheck();
        if($apply_status == 1){
            echo"<script>alert('审核中，无法重复提交');window.history.go(-1)</script>";
        }
        else if($apply_status == 2){
            echo"<script>alert('您已经审核通过');window.history.go(-1)</script>";
        }
        else if($apply_status == 3){
            $return_info['title'] .= ' 补充资料';
            $user_id = session()->get('user_id');
            $return_info['has_file'] = IndexApply::where('user_id',$user_id)->first()->toArray();
            $has_empty = false;
            foreach($return_info['has_file'] as $key=>$vo){
                if(empty($vo)){
                    $has_empty = true;
                    break;
                }
            }
            if($has_empty)
                return view('user.user_apply_add',$return_info);
            else
                echo"<script>alert('您已经审核通过');window.history.go(-1)</script>";
        }
        else
            return view('user.user_apply',$return_info);

    }

    //申请入库
    public function userApplyDo(Request $request){
        $apply_check = $this->userApplyCheck();
        //只有默认和待补充状态才能够上传
        if($apply_check!=0 && $apply_check !=3) return;
        //参数验证
        $rules = [
            'license_input' => 'required',
//            'wenhua_input' => 'required',
//            'xiaofang_input' => 'required',
//            'wangjian_input' => 'required',
            'kuandai_input' => 'required',
            'zufang_input' => 'required',
            'mentou_input' => 'required',
            'neibu_input' => 'required',
            'xiaofangtongdao_input' => 'required',
            'zhengxin_input' => 'required',
            'legal_person_card_front' => 'required',
            'legal_person_card_back' => 'required',
        ];

        $messages = [
            'license_input.required' => '请上传营业执照',
//            'wenhua_input.required' => '请上传文化许可证',
//            'xiaofang_input.required' => '请上传消防合格证',
//            'wangjian_input.required' => '请上传网络监察证',
            'kuandai_input.required' => '请上传宽带接入协议/证明',
            'zufang_input.required' => '请上传租房协议',
            'mentou_input.required' => '请上传门头照片',
            'neibu_input.required' => '请上传网咖内部环境照片',
            'xiaofangtongdao_input.required' => '请上传消防通道照片',
            'zhengxin_input.required' => '请上传法人个人征信',
            'legal_person_card_front.required' => '请上传法人身份证正面照片',
            'legal_person_card_back.required' => '请上传法人身份证反面照片',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);
        //字段验证，如果是待补充 就不验证
        if ($validator->fails() && $apply_check!=3) {
            $msg = $validator->errors()->messages();
            $ret_msg = '';
            foreach($msg as $key=>$vo){
                $ret_msg .= $vo[0].', ';
            }
            returnJson(0,rtrim($ret_msg,', '));
        }
        else{
            $user_id = session()->get('user_id');
            $data = $request->all();
            //取用户数据
            DB::beginTransaction();
            if($apply_check==3){
                $data['updated_at']=date('Y-m-d H:i:s');
                $res1 = IndexApply::where('user_id',$user_id)->update($data);
                $res2 = 1;
            }
            else{
                $res1 = IndexApply::insertApply($data);
                $res2 = IndexUsers::where('id',$user_id)->where('apply_status',0)->update(['apply_status'=>1]);
            }

            if($res1 && $res2){
                DB::commit();
                returnJson(1,'成功');
            }
            else{
                DB::rollBack();
                returnJson(0,'提交失败');
            }
        }
    }

    //短信接口
    public function sendSms(Request $request){
        $tel = $request->get('tel');
        $ip = $request->getClientIp();
        if(isTel($tel)){
            //已经注册过就跳出
            if(IndexUsers::where('user_name',$tel)->count())
                returnJson(0,'该帐号已注册过');
            //检测是否可以发送
            else if(LogSms::check($tel,$ip)){
                $code = mt_rand(1000,9999);
                session()->put('a'.$tel,$code);
                //发送前准备
                $content = "您的注册验证码是：".$code."，10分钟内有效，若非本人操作，请忽略！";
                saveLog("../storage/logs/PhoneSms_".date("Ymd").".log",'time:'.date('Y-m-d H:i:s').PHP_EOL.'tel:'.$tel.PHP_EOL.'content:'.$content);
                //发送
                $send = $this->sendSmsDo($tel,$content);
                if($send){
                    LogSms::insertDo($tel,$ip);
                    saveLog("../storage/logs/PhoneSms_".date("Ymd").".log",'time:'.date('Y-m-d H:i:s').PHP_EOL.'tel:'.$tel.PHP_EOL.'status:success');
                    returnJson(1,'发送成功');
                }
                else {
                    saveLog("../storage/logs/PhoneSms_".date("Ymd").".log",'time:'.date('Y-m-d H:i:s').PHP_EOL.'tel:'.$tel.PHP_EOL.'status:fail');
                    returnJson(0,'发送失败');
                }
            }
            else
                returnJson(0,'您短时间尝试过太多次，请稍后重试');
        }
        else{
            returnJson(0,'电话号码错误');
        }

    }

    public function sendSmsDo($tel,$content){
// 短信应用SDK AppID
        $appid = 1400095142; // 1400开头
// 短信应用SDK AppKey
        $appkey = "d43d1681a6a1ca6859591bea9af94c54";
// 短信模板ID，需要在短信应用中申请
//        $templateId = 129353;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
//        $smsSign = "趣租乐"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
        $content = '【趣租乐】'.$content;
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $result = $ssender->send(0, "86", $tel, $content, "", "");
            $rsp = json_decode($result);
            if($rsp->errmsg=='OK')
                return true;
            else return false;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
    }
}
