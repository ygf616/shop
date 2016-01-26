<?php

namespace Admin\Controller;

class GoodsController extends AdminController {

    public function showlist() {
        $Goods = M('Goods'); // 实例化User对象
        $count = $Goods->count(); // 查询满足要求的总记录数
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
        $list = $Goods->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('info', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display(); // 输出模板
    }

    public function add() {
        header("Content-Type:text/html; charset=utf-8");
        $Goods = M('Goods'); // 实例化User对象
        if ($_POST) {
            $Goods->create();
            $result = $Goods->add(); //写入数据到数据库     
            if ($result) {// 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $this->success('新增成功', 'showlist',3);
            }  else {
                $this->error('新增失败','add',5);
            }
        } else {
            $this->assign('MODULE',$__MODULE__);
            $this->display();
        }
    }

    public function showlist2() {
        $Goods = M("Goods"); // 实例化Goods对象
        $info = $Goods->select();
        $this->assign('info', $info);
        $this->display();
    }

}
