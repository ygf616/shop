<?php

namespace Admin\Controller;

class IndexController extends AdminController {

    public function index() {
        header("Content-Type:text/html; charset=utf-8");
        $this->display();
    }

    public function head() {
        header("Content-Type:text/html; charset=utf-8");
        $this->display();
    }

    public function left() {
        header("Content-Type:text/html; charset=utf-8");
        $Auth = M("Auth"); // 实例化Auth对象
        $sql = "select b.role_auth_ids from tp_manager a join tp_role b on a.mg_role_id=b.role_id"
                . " where a.mg_id=" . $_SESSION['mg_id'];
        $info = $Auth->query($sql);
        $anth_ids = $info[0]['role_auth_ids'];

        //查询具体权限
        //查询父权限
        $sql = "select * from tp_auth where auth_id in ($anth_ids) and auth_level=0";
        $list1 = $Auth->query($sql);
        //查询子权限
        $sql = "select * from tp_auth where auth_id in ($anth_ids) and auth_level=1";
        $list2 = $Auth->query($sql);
        $this->assign('list1', $list1);
        $this->assign('list2', $list2);
        $this->display();
    }

    public function right() {
        header("Content-Type:text/html; charset=utf-8");
        $this->display();
    }

    public function left2() {
        header("Content-Type:text/html; charset=utf-8");
        $Auth = M("Auth"); // 实例化Auth对象
        $list1 = $Auth->where('auth_pid=0')->select();
        $this->assign('list1', $list1);
        $list2 = $Auth->where('auth_pid!=0')->select();
        $this->assign('list2', $list2);
        $this->display();
    }

}
