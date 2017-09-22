<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

/**
 * 首页
 */
class IndexController extends Controller
{

    public function index()
    {
        $this->display();
    }

    /**
     * 后台登录页
     */
    public  function login()
    {
        $this->display();
    }

    /**
     * 验证码生成
     */
    public function generatorVerfiy()
    {
        $config = array(
            'fontSize' => 24,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
        );

        $verify = new Verify($config);
        $verify->imageW = 158;//验证码宽度
        $verify->imageH = 41;//验证码高度
        $verify->entry();
    }
}