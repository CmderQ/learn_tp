<?php
/**
 * 测试控制器---关于一些新的方法测试控制器
 */

namespace Home\Controller;

use Think\Controller;

class TestController extends Controller
{
    //redis安装使用测试
    public function redis()
    {
        $redis = new \Redis();
        $redis->connect(C('REDIS_HOST'), C('REDIS_PORT'));
        $redis->set('test', 'hello world!');
        echo $redis->get("test");
    }

    public function index()
    {
        $this->display();
    }

    public function check()
    {
        $multiArr = [
            'aaa' => [
                'a' => [
                    'num' => '1',
                ],
                'b' => [
                    'num' => '2',
                ]
            ],
            'bbb' => [
                'c' => [
                    'num' => '3',
                ],
                'd' => [
                    'num' => '4',

                ]
            ]
        ];
        $this->assign('list', $multiArr);
        $this->display();
    }
}