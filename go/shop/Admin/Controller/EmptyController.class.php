<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller{ 
    function _empty()
    {
        echo "<img src='".IMG_URL."404.jpg' alt='' />";
    }
}
