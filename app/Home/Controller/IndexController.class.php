<?php
/**
 * 投票操作控制器
 */

namespace Home\Controller;

use Think\Controller;

/**
 * 首页
 */
class IndexController extends Controller
{

    /**
     * @var /Home/Model/VoteModel
     */
    protected $voteservice;

    public function __construct()
    {
        parent::__construct();
        $this->voteservice = D('Vote');
    }

    public function index()
    {
        $number = I('post.number', 0, 'intval');

        if (!empty($number)) {
            $number = $this->checkInput($number);

            //将对于的number写入redis里面
            $redis = new \Redis();
            $redis->connect('127.0.0.1', 6379);
//            dump($redis->lPush('num', $number));
//            dump($redis->brPop('num', $redis -> lLen('num')));

            $resultGetInfo = $this->voteservice->getInfo($number);

            //根据图片id，判断数据库中是否存在对于id的数据，若没有，则说明是第一次投票，进行添加操作，反之，则进行更新操作
            if (empty($resultGetInfo)) {
                $resultAddInfo = $this->voteservice->addData($number);
                if (!$resultAddInfo) {
                    $this->error('初次投票失败，请重试!');
                }
            } else {
                $resultUdpateInfo = $this->voteservice->updateVote($number, $resultGetInfo['votenumber']);
                if (!$resultUdpateInfo) {
                    $this->error('投票失败，请重试!');
                }
            }

            $this->success('投票成功，谢谢合作！');
        }

        //获取当前的投票信息结果
        $resultQueryList = $this->voteservice->getInfoList();
        $resultList = [];
        foreach ($resultQueryList as $key => $value) {
            $resultList[$value['id']] = $value['votenumber'];
        }

        $this->assign('data', $resultList);
        $this->display();
    }

    //检查传入的参数
    private function checkInput($num)
    {
        $betwwenArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        if (!is_numeric($num) || !in_array($num, $betwwenArr)) {
            $this->error('您选择的图片有问题， 请重新选择!');
        }

        return $num;
    }

}