<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 首页
 */
class IndexController extends Controller
{

    public function index()
    {
        if($_SESSION['user_name'] == ''){
            $this->redirect("/login/index", '',1, '请先进行登录...');
        }
    }
}