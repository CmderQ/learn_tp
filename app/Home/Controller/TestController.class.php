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
}