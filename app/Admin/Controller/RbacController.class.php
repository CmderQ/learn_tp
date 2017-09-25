<?php
/**
 * Rbac 控制器
 * Created by PhpStorm.
 * Filename:  Rbac.class.php
 * User:      cmder
 * Date:      2017/9/25
 * Time:      7:40
 */

namespace Admin\Controller;

use Think\Controller;

class RbacController extends Controller
{
    /**
     * @var /Admin/Model/RoleModel
     */
    protected $roleservice;

    public function __construct()
    {
        parent::__construct();
        $this->roleservice = D('Role');
    }

    //角色列表
    public function role_list()
    {
        $this->role = $this->roleservice->getRoleList();
        $this->display();
    }

    //添加角色
    public function add_role()
    {
        $this->display();
    }

    //添加角色表单处理
    public function add_role_handle()
    {
        $data = I('post.', '');
        if ($this->roleservice->addRole($data)) {
            $this->success('添加成功', U('role_list', '', ''));
        } else {
            $this->error('添加失败');
        }
    }
}