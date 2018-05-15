<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ItemClass extends Model
{
    public $timestamps = false;
    protected $table = 'item_class';

    public static function insertItemClass($data){
        $insert = [
            'pid'=>$data['pid'],
            'class_name'=>$data['class_name'],
        ];
        return self::insert($insert);
    }
    public static function updateItemClass($id,$data){
        $update = [
            'class_name'=>$data['class_name'],
        ];
        return self::where('id',$id)->update($update);
    }

    public static function deleteItemClass($id){
        return self::where('id',$id)->orwhere('pid',$id)->delete();
    }
}
