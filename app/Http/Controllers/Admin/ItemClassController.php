<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\ItemClass;

use Illuminate\Support\Facades\Validator;
class ItemClassController extends Controller
{
    public $menu_id = 2;

    public function index(){
        if(authCheck($this->menu_id,__FUNCTION__)) {
            $list = ItemClass::get();

            $format_list = [];
            if ($list) {
                $list = getSon($list);
                foreach ($list as $key => $vo) {
                    $format_list[] = $list[$key];
                    if (isset($list[$key]['children'])) {
                        foreach ($list[$key]['children'] as $key2 => $vo2) {
                            $foo = $list[$key]['children'][$key2];
                            $foo['class_name'] = '&nbsp;&nbsp;&nbsp;&nbsp;|------ ' . $vo2['class_name'];
                            $format_list[] = $foo;
                        }
                    }
                }
            }

            returnJson(1, '获取成功', ['list' => $format_list]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }


    public function store(Request $request){
        //参数验证
        $rules = [
            'pid'=>'required|Numeric',
            'class_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = ItemClass::insertItemClass($data);
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
            $data = ItemClass::find($id);
            returnJson(1,'获取成功',['data'=>$data]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }
    public function update(Request $request,$id){
        //参数验证
        $rules = [
            'pid'=>'required|numeric',
            'class_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = ItemClass::updateItemClass($id,$data);
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
            $res = ItemClass::deleteItemClass($id);
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
