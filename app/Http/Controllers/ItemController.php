<?php

namespace App\Http\Controllers;

use App\Http\Model\ItemList;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class ItemController extends Controller
{
    public $menu_id = 2;

    public function index(Request $request){
        $list = ItemList::get();
        if($list){
            foreach ($list as $key=>$item) {
                $list[$key]['is_show']= $item['is_show'] == 1 ? '展示': '不展示';
            }
        }
        returnJson(1,'获取成功',['list'=>$list]);
    }
    public function create(Request $request){
        $request->input();
    }

    public function store(Request $request){
        //参数验证
        $rules = [
            'item_name' => 'required',
            'item_price' => 'required|numeric',
            'item_rent_price' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = ItemList::insertItem($data);
                if($res)
                    returnJson(1,'新增成功');
                else
                    returnJson(0,'新增失败');
            }
            else{
                returnJson(0,'权限不足');
            }
        }
    }
}
