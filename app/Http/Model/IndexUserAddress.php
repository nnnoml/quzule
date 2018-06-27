<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class IndexUserAddress extends Model
{
    public $timestamps = false;
    protected $table = 'index_user_address';

    public static function getAddressList(){
        $user_id  = session()->get('user_id');
        return self::where('user_id',$user_id)->get();
    }
}
