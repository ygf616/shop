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
            $ver = new \Think\Verify();
            if ($ver -> check($_POST['captcha'])) {
                // 验证用户名 对比 密码
                if ($result && $data['mg_pwd'] == $result['mg_pwd']) {
                    // 存储session
                    session('mg_id', $result['mg_id']);          // 当前用户id
                    session('mg_name', $result['mg_name']);   // 当前用户名
                    //$this->success('登录成功,正跳转至系统首页...', U('Index/index'), 3);
                    $this->redirect('Index/index', '登录成功,正跳转至系统首页...');
                } else {
                    $this->error('登录失败,用户名或密码不正确!');
                }
            } else {
                $this->error('亲，验证码输入错误!');
            }
        } else {
            $this->display();
        }
    }

    public function verify() {
        ob_clean();
        $Verify = new \Think\Verify();
        $Verify->fontSize = 9;
        $Verify->length = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->entry();
    }

}
