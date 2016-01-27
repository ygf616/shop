<?php

namespace Admin\Controller;

class LoginController extends AdminController {

    public function login() {
        header("Content-Type:text/html; charset=utf-8");
        $Login = D('Login'); // 实例化User对象
        if ($_POST) {
            $data = $Login->create();
            // 组合查询条件
            $where = array();
            $where['mg_name'] = $data['mg_name'];
            $result = $Login->where($where)->field('mg_id,mg_name,mg_pwd,mg_time,mg_role_id')->find();
            
            // 验证用户名 对比 密码
            if ($result && $data['mg_pwd'] == $result['mg_pwd']) {
                // 存储session
                session('mg_id', $result['mg_id']);          // 当前用户id
                session('mg_name', $result['mg_name']);   // 当前用户名
                $this->success('登录成功,正跳转至系统首页...', U('Index/index'),3);
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display();
        }
    }
}
