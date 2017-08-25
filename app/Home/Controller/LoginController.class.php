<?php

namespace Home\Controller;

use Think\Controller;
use Think\Verify;

/**
 * 登录页面
 */
class LoginController extends Controller
{
    /**
     * @var /Home/Model/LoginModel
     */
    protected  $loginservice;

    public function __construct()
    {
        parent::__construct();
        $this->loginservice = D('Login');
    }

    /**
     * 注册登录首页
     */
    public function index()
    {
        $this->display();
    }

    /**
     * 注册方法
     */
    public function register()
    {
        if (IS_AJAX) {
            $username = I('post.user');
            $password = I('post.paword');
            $email = I('post.email');

            if (empty($username)) {
                $this->error('用户名不能为空');
            }
            if (mb_strlen($username, 'utf-8') < 6 || mb_strlen($username, 'utf-8') > 15) {
                $this->error('用户名长度范围为6到15位');
            }
            if (empty($password)) {
                $this->error('密码不能为空');
            }
            if (trim($password) < 6) {
                $this->error('密码长度最少为6位');
            }

//            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
//            if (!preg_match($pattern, $email)) {
//                $this->error('邮箱格式不正确, 请重新输入');
//            }
            $password = Crypt($password);
            $result = $this->loginservice->register($username, $password, $email);
            if (!$result) {
                $this->error('注册失败，请重试');
            }

            $this->success('注册成功');

        } else {
            $this->error('提交失败，请重试');
        }
    }

    /**
     * 登录校验
     */
    public function login()
    {
        if (IS_AJAX) {
            $username = I('post.user');
            $password = I('post.paword');
            $codeverify = I('post.verify', '');
            if (!check_verify(strtolower($codeverify))) {
                $this->error("亲，验证码输错了哦！");
            }
            $where = [];
            $where['user_name'] = $username;
            $where['password'] = Crypt($password);
            $result = $this->loginservice->getInfo($where);
            if(!$result){
                $this->error("亲，用户名或密码输入错误，请重新输入哦！");
            }
            $this->success("登录成功!");
        }
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
        $verify->imageW = 160;//验证码宽度
        $verify->imageH = 50;//验证码高度
        $verify->entry();
    }
}