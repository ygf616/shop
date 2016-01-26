<?php
namespace Admin\Controller;
class IndexController extends AdminController{
    public function index(){
        $this->display();
    }
    
     public function head(){
        $this->display();
    }
    
    public function left(){
        header("Content-Type:text/html; charset=utf-8");
        $Auth = M("Auth"); // 实例化Auth对象
        $list1 = $Auth->where('auth_pid=0')->select();
        $this->assign('list1', $list1);
        $list2 = $Auth->where('auth_pid!=0')->select();
        $this->assign('list2', $list2);
        $this->display();
    }
    
    public function right(){
        $this->display();
    }  
}