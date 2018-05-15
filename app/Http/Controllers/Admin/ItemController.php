<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\ItemClass;
use App\Http\Model\ItemList;
use App\Http\Model\ItemImg;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class ItemController extends Controller
{
    public $menu_id = 3;

    public function index(){
        $list = ItemList::getList();
        if($list){
            foreach ($list as $key=>$item) {
                $list[$key]['is_show']= $item['is_show'] == 1 ? '展示': '不展示';
            }
        }
        returnJson(1,'获取成功',['list'=>$list]);
    }

    public function store(Request $request){
        //参数验证
        $rules = [
            'item_name' => 'required',
            'item_class' => 'required|numeric',
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
    public function edit($id){
        if(authCheck($this->menu_id,__FUNCTION__)){
            $data = ItemList::find($id);
            $imgs = ItemImg::where('item_id',$id)->pluck('img_url');
            returnJson(1,'获取成功',['data'=>$data,'imgs'=>$imgs]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }
    public function update(Request $request,$id){
        //参数验证
        $rules = [
            'item_name' => 'required',
            'item_class' => 'required|numeric',
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
                $res = ItemList::updateItem($id,$data);
                if($res!==false)
                    returnJson(1,'更新成功');
                else
                    returnJson(0,'更新失败');
            }
            else{
                returnJson(0,'权限不足');
            }
        }
    }
    public function destroy($id){
        if(authCheck($this->menu_id,__FUNCTION__)){
            $res = ItemList::deleteItem($id);
            if($res)
                returnJson(1,'删除成功');
            else
                returnJson(0,'删除失败');
        }
        else{
            returnJson(0,'权限不足');
        }
    }
}
