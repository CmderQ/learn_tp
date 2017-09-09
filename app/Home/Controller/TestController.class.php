<?php
/**
 * 测试控制器---关于一些新的方法测试控制器
 * Created by PhpStorm.
 * Filename:  TestController.php
 * User:      wuhaiqiao
 * Date:      2017/8/30
 * Time:      13:41
 */

namespace Home\Controller;

use Think\Controller;

class TestController extends Controller
{
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