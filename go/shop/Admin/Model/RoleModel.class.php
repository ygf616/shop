<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
    function distributeAuth($auth,$role_id){
        $ids = implode(',', $auth);
        $sql = "select auth_c,auth_a from tp_auth where auth_id in ($ids)";
        $info = $this ->query($sql);
        $ac = '';
        foreach ($info as $k => $v){
            if (!empty($v['auth_c'])&& !empty($v['auth_a'])){
                $ac .= $v['auth_c'].'-'.$v['auth_a'].',';
            }
        }
        $ac = $ac.rtrim($ac,',');
        $sql = "update tp_role set role_auth_ids='$ids',role_auth_ac='$ac' "
                . "where role_id='$role_id'";
        return $this->execute($sql);
    }
}
