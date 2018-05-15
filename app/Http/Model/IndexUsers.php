<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class IndexUsers extends Model
{
    public $timestamps = false;

    public static function getUserInfo($user_name){
        return self::where('user_name',$user_name)->first();
    }

    public static function changePwd($user_id,$old_pwd,$new_pwd){
        $db_old_pwd = self::where('id',$user_id)->value('password');
        if(password_verify($old_pwd,$db_old_pwd)) {
            $hash_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
            return
                self::where('id', $user_id)->update(['password' => $hash_pwd]);
        }
        else return 'old_pwd_error';
    }
}
