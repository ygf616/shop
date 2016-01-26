<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{ 
    public function _empty(){
        echo "<img src='".IMG_URL."404.jpg' alt='' />";
    }
}