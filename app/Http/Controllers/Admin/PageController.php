<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Model\PageLists;

use Illuminate\Support\Facades\Validator;
class PageController extends Controller
{
    public $menu_id = 3;

    public function index(){
        $list = PageLists::get();
        returnJson(1,'获取成功',['list'=>$list]);
    }
    public function store(Request $request){
        //参数验证
        $rules = [
            'page_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = PageLists::insertPage($data);
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
            $data = PageLists::find($id);
            returnJson(1,'获取成功',['data'=>$data]);
        }
        else{
            returnJson(0,'权限不足');
        }
    }
    public function update(Request $request,$id){
        //参数验证
        $rules = [
            'page_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            returnJson(0,json_encode($validator->messages()));
        }
        else{
            $data = $request->all();
            //权限判断
            if(authCheck($this->menu_id,__FUNCTION__)){
                $res = PageLists::updatePage($id,$data);
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
            $res = PageLists::deletePage($id);
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
