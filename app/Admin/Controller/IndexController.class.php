<?php
/**
 * 后台登录控制器
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

/**
 * 首页
 */
class IndexController extends Controller
{

    /**
     * @var /Admin/Model/LoginModel
     */
    protected $loginservice;

    public function __construct()
    {
        parent::__construct();
        $this->loginservice = D('Login');
    }

    /**
     * 后台登录页
     */
    public function index()
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

    /**
     * 登录校验
     */
    public function login()
    {
        //启动session的初始化
        session_start();

        if (IS_AJAX) {
            $username = I('post.user');
            $password = I('post.paword');
            $codeverify = I('post.verify', '');
            if (!check_verify(strtolower($codeverify))) {
                $this->error("亲，验证码输错了哦！");
            }

            $where = [];
            $where['user_name'] = $username;
            $where['password'] = Crypt($password, C('SALT'));
            $result = $this->loginservice->getInfo($where);

            if (!$result) {
                $this->error("亲，登陆失败，请重试！");
            }

            //登陆成功，则将对于的用户名写入到session中保存
            $_SESSION = array();
            $_SESSION["username"] = $username;

            $this->success("登录成功!");
        }
    }

}