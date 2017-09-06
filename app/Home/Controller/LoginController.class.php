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
    protected $loginservice;

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

            //对参数进行校验
            $checkResult = $this->checkparam($username, $password, $email);
            if ($checkResult) {
                //对注册的用户名和邮箱进行过滤，防止XSS和SQL注入攻击
                $username = htmlentities($username);
                $email = htmlentities($email);

                //对密码使用Crypt()函数进行加密
                $password = Crypt($password);
                $result = $this->loginservice->register($username, $password, $email);

                if (!$result) {
                    $this->error('注册失败，请重试');
                }

                $this->success('注册成功');
            }

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

            if (!$result) {
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


    /**
     * 检查邮箱有无被注册和用户名是否已存在
     */
    public function checkInfo()
    {
        $type = I("post.type");
        if ($type == 2) {
            $where['email'] = I('post.email');
        }
        if ($type == 1) {
            $where['user_name'] = I('post.username');
        }
        $result = $this->loginservice->getInfo($where);

        //邮箱检验
        if ($type == 2) {
            if ($result) {
                $this->success('邮箱地址已存在');
            } else {
                $this->error('邮箱地址不存在!');
            }
        }

        //用户名检验
        if ($type == 1) {
            if ($result) {
                $this->success('用户名已存在');
            } else {
                $this->error('用户名不存在!');
            }
        }


    }

    /**
     * 对传入的参数进行校验
     *
     * @param $username
     * @param $password
     * @param $email
     * @return bool
     */
    private function checkparam($username, $password, $email)
    {
        if (empty($username)) {
            $this->error('用户名不能为空');
        }

        if (mb_strlen($username, 'utf-8') < 6 || mb_strlen($username, 'utf-8') > 15) {
            $this->error('用户名长度范围为6到15位');
        }

        if (empty($password)) {
            $this->error('密码不能为空');
        }

        if (strlen(trim($password)) < 6) {
            $this->error('密码长度最少为6位');
        }

        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (!preg_match($pattern, $email)) {
            $this->error('邮箱格式不正确, 请重新输入');
        }

        return true;
    }
}