<?php

return array(
    //'配置项'=>'配置值'
    //页面跟踪
    'SHOW_PAGE_TRACE' => true,
    //数据库配置信息
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'thinkphp', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', //密码
    'DB_PORT' => 3306, //端口
    'DB_PREFIX' => 'tp_', //数据库表前缀 
    'DB_CHARSET' => 'utf8', // 字符集
    //模板引擎 
    // 'TMPL_ENGINE_TYPE' => 'Smarty',
    // 默认模板缓存后缀 
    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'dispatch_jump.tpl',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'dispatch_jump.tpl',
);
