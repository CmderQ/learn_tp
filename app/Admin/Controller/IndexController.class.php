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
        phpinfo();
        echo '这是后台首页';
    }
}