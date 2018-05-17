<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\IndexUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexUserController extends Controller
{
    public $menu_id = 6;

    public function index(){
        if(authCheck($this->menu_id,__FUNCTION__)) {
            $list = IndexUsers::get();
            returnJson(1, '获取成功', ['list' => $list]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }
}
