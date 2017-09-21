<?php
return array(
    //'配置项'=>'配置值'
    //设置可访问目录
    'MODULE_ALLOW_LIST' => array('Home', 'Admin'),
    //设置默认目录
    'DEFAULT_MODULE' => 'Home',
    //数据库配置
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'user',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => '',          // 密码
    'DB_PORT' => 3306,        // 端口
    'DB_PREFIX' => 'cms_',    // 数据库表前缀
    'DB_CHARSET' => 'utf8',      // 数据库编码
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志

    //静态文件配置
    'TMPL_PARSE_STRING'  =>array(
        '__CSS__' => __ROOT__.'/Public/static/css',
        '__JS__'     =>__ROOT__.'/Public/static/js',
        '__IMAGES__'=>__ROOT__.'/Public/static/images',

        //后台样式配置
        '__ADMIN_CSS__' => __ROOT__.'/Public/static/admin/css',
        '__ADMIN_JS__'     =>__ROOT__.'/Public/static/admin/js',
        '__ADMIN_IMAGES__'=>__ROOT__.'/Public/static/admin/images',
    ),
);