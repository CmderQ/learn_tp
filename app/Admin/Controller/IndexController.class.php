<?php

namespace Admin\Controller;

use Think\Controller;

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
}