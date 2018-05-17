<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Model\ItemClass;

class IndexCommonController extends Controller
{
    public $user_info = [];
    public $return_info = [];
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(session()->has('user_id') && session()->has('user_name')){
                $this->user_info['user_id'] = session()->get('user_id');
                $this->user_info['user_name'] = session()->get('user_name');
                $this->return_info['user_info'] = $this->user_info;
            }
            return $next($request);
        });
        $list = ItemClass::get();

        $format_list = [];
        if ($list) {
            $list = getSon($list);
            foreach ($list as $key => $vo) {
                $bar['id'] = $vo['id'];
                $bar['class_name'] = $vo['class_name'];
                if (isset($list[$key]['children'])) {
                    $bar['has_son'] = true;
                }
                $format_list[] = $bar;

                if (isset($list[$key]['children'])) {
                    foreach ($list[$key]['children'] as $key2 => $vo2) {
                        $foo['id'] = $vo2['id'];
                        $foo['class_name'] = '&nbsp;&nbsp;&nbsp;&nbsp;|---- ' . $vo2['class_name'];

                        $format_list[] = $foo;
                    }
                }

            }
        }
        $this->return_info['menu'] = $format_list;
    }
}