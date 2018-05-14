<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('index');
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
