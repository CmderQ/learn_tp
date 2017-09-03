<?php
/**
 * 投票相关操作
 */

namespace Home\Model;

use Think\Model\RelationModel;

class VoteModel extends RelationModel
{
    /**
     * 插入方法
     *
     * @param $number
     * @param $picNo
     * @return bool
     */
    public function updateVote($number, $picNo)
    {
        $data = array(
            'votenumber' => $picNo + 1
        );

        $result = $this->where('id = ' . $number)->save($data);
        if (!$result) {
            return false;
        }
        return true;
    }

    /**
     * 根据图片的id查找对应的信息
     *
     * @param $number
     * @return bool|false|mixed|\PDOStatement|string|\think\Collection
     */
    public function getInfo($number)
    {
        if (empty($number)) {
            return false;
        }

        return $this->where('id = ' . $number)->find();
    }


    /**
     * 添加数据
     *
     * @param $number
     * @return bool
     */
    public function addData($number)
    {
        $data = array(
            'id' => $number,
            'votenumber' => 1,
            'url' => '',
            'creatime' => date("Y-m-d H:i:s"),
        );

        if ($this->create($data)) {
            $uid = $this->add();
            if ($uid) {
                return true;
            }
        }
        return false;
    }


    /**
     * 获取所有的投票信息
     *
     * @return mixed
     */
    public function getInfoList()
    {
        return $this->select();
    }

}