<?php

namespace Admin\Controller;

class RoleController extends AdminController {

    public function showlist() {
        header("Content-Type:text/html; charset=utf-8");
        $Role = M('Role'); // 实例化Role对象
        $count = $Role->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->setConfig('header', '共%TOTAL_ROW%条');
        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '共%TOTAL_PAGE%页');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('link', 'indexpagenumb'); //pagenumb 会替换成页码
        $Page->setConfig('theme', '%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Role->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('info', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }

    public function distribute($role_id) {
        header("Content-Type:text/html; charset=utf-8");
        if ($_POST) {
            $result=D("Role")->distributeAuth($_POST['auth_name'],$role_id);
            if($result){
                $this->success("分配权限成功",U("Role/showlist"),3);
            }
        } else {
            $Auth = M("Auth"); // 实例化Auth对象
            $pauth = $Auth->where("auth_level=0")->select();
            $sauth = $Auth->where("auth_level=1")->select();

            $role_info = D("Role")->getByRole_id($role_id);
            $role_name = $role_info['role_name'];
            $role_auth_ids = $role_info['role_auth_ids'];
            $this->assign('role_name', $role_name); // 赋值数据集
            $this->assign('role_auth_ids', ',' . $role_auth_ids . ','); // 赋值数据集
            $this->assign('pauth', $pauth); // 赋值数据集
            $this->assign('sauth', $sauth); // 赋值数据集
            $this->display(); // 输出模板
        }
    }
}
