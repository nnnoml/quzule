<?php

namespace App\Http\Controllers\Index;

use App\Http\Model\ItemClass;
use App\Http\Model\ItemImg;
use App\Http\Model\ItemList;

use App\Http\Model\PageLists;
use Illuminate\Http\Request;

class IndexController extends IndexCommonController
{
    public function index(){
        $return_info = $this->return_info;
        $return_info['nav'] = 'home';
        $return_info['title'] = '首页';
        $return_info['product'] = ItemList::getItem(0,0,8);
        return view('index',$return_info);
    }

    public function page($id=0){
        $return_info = $this->return_info;
        $return_info['nav'] = 'page'.$id;
        $return_info['page'] = PageLists::find($id);
        $return_info['page_list'] = PageLists::getList();
        $return_info['title'] = $return_info['page']['page_name'];
        return view('page',$return_info);
    }
    public function product($list=0){
        $return_info = $this->return_info;
        $return_info['nav'] = 'product';

        if($list){
            $return_info['product_class_name'] = ItemClass::className($list);
            $return_info['title'] = $return_info['product_class_name'];
        }
        else{
            $return_info['product_class_name'] = '全部商品';
            $return_info['title'] = '全部商品';
        }
        $return_info['product'] = ItemList::getItem($list);
        return view('product_list',$return_info);
    }
    public function productDetail($list,$id){
        $return_info = $this->return_info;
        $return_info['nav'] = 'product';
        $return_info['product'] = ItemList::getItem($list,$id);
        $return_info['img_list'] = ItemImg::getImgList($id);
        if(!isset($return_info['product']))
            abort(404);
        else
            return view('product_detail',$return_info);
    }
}
