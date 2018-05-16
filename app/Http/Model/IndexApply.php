<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class IndexApply extends Model
{
    protected $table = 'index_apply';

    public static function insertApply($data){
        $user_id  = session()->get('user_id');
        $insert = [
            'user_id' => $user_id,
            'comp_name' => $data['comp_name'],
            'comp_reg_num' => $data['comp_reg_num'],
            'comp_reg_time' => $data['comp_reg_time'],
            'license' => rtrim($data['license_input'],','),
            'legal_person_name' => $data['legal_person_name'],
            'legal_person_id' => $data['legal_person_id'],
            'legal_person_card_front' => rtrim($data['legal_person_card_front_input'],','),
            'legal_person_card_back' => rtrim($data['legal_person_card_back_input'],','),
            'area_img' => rtrim($data['area_img_input'],','),
            'check_user_id' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return self::insert($insert);
    }

    public static function updateApply($id,$data){
        $update = [
            'check_status'=>$data['check_status'],
            'check_user_id'=>session()->get('user_id'),
            'checked_at'=>date('Y-m-d H:i:s'),
        ];
        return self::where('id',$id)->update($update);
    }

    public static function getList($id=0){

        $self_conn = new self;
        $user_conn = new IndexUsers;
        $self_table_name = $self_conn->getTable();
        $user_table_name = $user_conn->getTable();
        $list = $self_conn->from("$self_table_name as a")
            ->leftJoin("$user_table_name as u",'u.id','a.user_id');

        if($id)
            $list->where('a.id',$id);

        $list = $list->select('a.*','u.user_name')->get();

        if($list){
            foreach($list as $key=>$vo){
                switch( $vo['check_status']){
                    case 0: $list[$key]['check_status_cn'] = '待审核';break;
                    case 1: $list[$key]['check_status_cn'] = '通过';break;
                    case 2: $list[$key]['check_status_cn'] = '驳回';break;
                }
                $list[$key]['area_img'] = explode(',',$vo['area_img']);
            }
        }

        return $list;
    }
}
