<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    public $timestamps = false;

    protected $table = 'admin_menu';

    public static function getMenuList($auth){
        $all_menu = self::get();
        $meun_list = [];
        foreach($all_menu as $key=>$vo){
            //全栏目 & 有读取权限
            if(array_key_exists('-1',$auth)){
                if(BinaryCheck($auth[-1],4))
                    $meun_list[] = ['name'=>$vo['menu_name'],'url'=>$vo['menu_url']];
            }
            //指定栏目 & 有读取权限
            else{
                if(array_key_exists($vo['id'],$auth)){
                    if(BinaryCheck($auth[$vo['id']],4))
                        $meun_list[] = ['name'=>$vo['menu_name'],'url'=>$vo['menu_url']];
                }
            }
        }
        return $meun_list;
    }
}
