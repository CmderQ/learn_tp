<?php

return array(
    //'配置项'=>'配置值'

    //redis配置项
    'DATA_CACHE_PREFIX' => 'cms_',//缓存前缀
    'DATA_CACHE_TYPE' => 'Redis',//默认动态缓存为Redis
    'REDIS_RW_SEPARATE' => false, //Redis读写分离 true 开启
    'REDIS_HOST' => '127.0.0.1', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
    'REDIS_PORT' => '6379',//端口号
    'REDIS_TIMEOUT' => '300',//超时时间
    'REDIS_PERSISTENT' => false,//是否长连接 false=短连接
    'REDIS_AUTH' => 123456,//AUTH认证密码
    'DATA_CACHE_TIME' => 10800,      // 数据缓存有效期 0表示永久缓存

    //Crypt函数加密salt
    'SALT' => 123456,

    //session设置
    'SESSION_OPTIONS' => array(
        'name' => 'username',                    //设置session名
        'expire' => 600,                      //SESSION保存10minute
        'use_trans_sid' => 1,                               //跨页传递
        'use_only_cookies' => 0,                               //是否只开启基于cookies的session的会话方式
    ),
);