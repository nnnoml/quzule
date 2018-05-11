<?php
/**
 * 返回指定json格式字符串
 */
function returnJson($code,$data='',$other_arr='')
{
    $res['code'] = (int)$code;
    if (is_array($data))
        if (empty($data)) $res['info'] = '';
        else
            foreach ($data as $key => $vo) {
                $res['info'][$key] = $vo;
            }
    else $res['msg'] = $data;

    if (is_array($other_arr))
        foreach ($other_arr as $key => $vo) {
            $res[$key] = $vo;
        }
    echo json_encode($res);
}
/**
 * 根据频道和操作判断该用户是否可以对栏目进行操作
 * @param $menu_id 菜单id
 * @param $handel  操作方式 store edit update show destroy
 * return true false
 */
function authCheck($menu_id,$handel){
    $handle_id = 0;
    switch($handel){
        case 'store': $handle_id = 1;break;
        case 'edit': $handle_id = 2;break;
        case 'update': $handle_id = 2;break;
        case 'show': $handle_id = 4;break;
        case 'destroy': $handle_id = 8;break;
    }

    $user_auth = session()->get('user_auth');
    if(empty($user_auth) || $handle_id == 0){
        return false;
    }
    else{
        $user_auth = json_decode($user_auth,true);

        //全局权限
        if(array_key_exists('-1',$user_auth)){
            return BinaryCheck($user_auth['-1'],$handle_id);
        }
        //栏目在权限缓存里
        else if(array_key_exists($menu_id,$user_auth)){
            return BinaryCheck($user_auth[$menu_id],$handle_id);
        }
        else
            return false;
    }
}

/**
 * 二进制检测，与后是否有权限
 * @param $user_auth
 * @param $handle
 * 0无权限，1创建，2修改，4读取，8删除
 */
function BinaryCheck($user_auth,$handle){
    //按位与，得到二进制码
    //true 表示用户权限包含了当前操作权限
    //false表示不包含
    return $user_auth & $handle ? true : false;
//        return $user_auth ^ $handle ? true : false;
}

/**
 * 二进制存储，或后存
 * @param $auth
 * 0无权限，1创建，2修改，4读取，8删除
 */
function BinarySet($auth){
    $result = 0;
    if(is_array($auth))
        foreach($auth as $key=>$vo){
            $result = $result ^ $vo;
        }
    return $result;
}