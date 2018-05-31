<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class LogSms extends Model
{
    public static function check($tel,$ip){

        //规则，1同一个ip一天100条，
        $ip_count = self::where('ip',ip2long($ip))
                    ->where('created_at','>=',date('Y-m-d').' 00:00:00')
                    ->count();
        //同一个手机一天10条
        $tel_count = self::where('tel',$tel)
                    ->where('created_at','>=',date('Y-m-d').' 00:00:00')
                    ->count();
        if($ip_count>=100 || $tel_count >=10)
            return false;
        else
            return true;
    }

    public static function insertDo($tel,$ip){
        return self::insert([
            'tel'=>$tel,
            'ip'=>ip2long($ip),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
