<?php
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./shop/');


//css、img
define('SITE_URL','http://shop.ygf.com/');
define('CSS_URL','/shop/admin/public/css/');
define('IMG_URL','/shop/admin/public/img/');
 // Think模板引擎标签库相关设定

//自定义输出参数
function show_bug($msg){
    echo '<pre style="color:red">';
    var_dump($msg);
    echo '</pre>';
}


// 引入ThinkPHP入口文件
require '../ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单