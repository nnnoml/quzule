<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\IndexUsers;

class IndexController extends Controller
{
    public $user_info = [];
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(session()->has('user_id') && session()->has('user_name')){
                $this->user_info['user_id'] = session()->get('user_id');
                $this->user_info['user_name'] = session()->get('user_name');
            }
            return $next($request);
        });
    }

    public function index(){
        $user_info = $this->user_info;

        return view('index',compact('user_info'));
    }
    public function page($id=0){
        return view('page');
    }
    public function product(){
        return view('product_list');
    }
    public function productDetail(){
        return view('product_detail');
    }
    public function __call($name ,$arguments=[] ){
        return view($name);
    }
}
