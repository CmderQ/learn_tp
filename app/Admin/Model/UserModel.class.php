<?php
/**
 * 注册登录操作
 */

namespace Admin\Model;

use Think\Model;

class UserModel extends Model
{

    //查找方法
    public function getInfo($where)
    {
        if(empty($where)){
            return false;
        }
        $result = $this->field('id')->where($where)->find();
        if($result){
            return true;
        }
        return false;
    }
}