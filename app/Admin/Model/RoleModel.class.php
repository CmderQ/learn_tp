<?php
/**
 * Created by PhpStorm.
 * Filename:  RoleModel.class.php
 * User:      cmder
 * Date:      2017/9/25
 * Time:      7:43
 */

namespace Admin\Model;

use Think\Model;

class RoleModel extends Model
{
    //获取角色列表
    public function getRoleList($where = null)
    {
        return $this->where($where)->select();
    }

    //角色添加方法
    public function addRole($data)
    {
        if(empty($data))
        {
            return false;
        }

        return $this->add($data);
    }
}