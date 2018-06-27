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
            'license' => rtrim($data['license_input'],','),

            'wenhua_input' => rtrim($data['wenhua_input'],','),
            'xiaofang_input' => rtrim($data['xiaofang_input'],','),
            'wangjian_input' => rtrim($data['wangjian_input'],','),
            'kuandai_input' => rtrim($data['kuandai_input'],','),
            'zufang_input' => rtrim($data['zufang_input'],','),
            'mentou_input' => rtrim($data['mentou_input'],','),
            'neibu_input' => rtrim($data['neibu_input'],','),
            'xiaofangtongdao_input' => rtrim($data['xiaofangtongdao_input'],','),
            'zhengxin_input' => rtrim($data['zhengxin_input'],','),

            'other1_input' => rtrim($data['other1_input'],','),
            'other2_input' => rtrim($data['other2_input'],','),
            'other3_input' => rtrim($data['other3_input'],','),

            'monitor_account' => trim($data['monitor_account']),
            'mark' => addslashes($data['mark']),

            'legal_person_card_front' => rtrim($data['legal_person_card_front'],','),
            'legal_person_card_back' => rtrim($data['legal_person_card_back'],','),
            'check_user_id' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        return self::insert($insert);
    }

    public static function updateApply($id,$data){
        $update = [
            'check_status'=>$data['check_status'],
            'check_user_id'=>session()->get('admin_user_id'),
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
                    case 3: $list[$key]['check_status_cn'] = '通过但需要完善';break;
                }
                $list[$key]['area_img'] = explode(',',$vo['area_img']);
            }
        }

        return $list;
    }
}
