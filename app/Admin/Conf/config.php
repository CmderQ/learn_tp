<?php

return array(
    //'配置项'=>'配置值'
    //Rbac配置
    'RBAC_SUPERADMIN'=>'admin',         //超级管理员名称
    'ADMIN_AUTH_KEY'=>'superadmin',     //超级管理员识别，存放在Session中
    'USER_AUTH_ON'=>true,               //是否开启权限认证
    'USER_AUTH_TYPE'=>1,                //验证类型 1-登陆时验证 2-实时验证
    'USER_AUTH_KEY'=>'uid',             //存储在session中的识别号
    'NOT_AUTH_MODULE'=>'Index',              //无需验证的控制器
    'NOT_AUTH_ACTION'=>'add_role_handle',              //无需验证的方法
);