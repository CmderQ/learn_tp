<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 登录页面
 */

class LoginController extends Controller
{

    //注册登录首页
    public function index()
    {
        $this->display();
    }

    //注册方法
    public function register()
    {
        $this->redirect('index');
    }
}