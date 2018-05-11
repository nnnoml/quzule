<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminRoleUsers extends Model
{
    public $timestamps = false;

    public static function AuthList($user_id){
        $auth_list = self::where('user_id',$user_id)->get();

        $return = [];
        if($auth_list){
            foreach ($auth_list as $item) {
                $return[$item['menu_id']] = $item['menu_auth'];
            }
        }
        return $return;
    }
}
