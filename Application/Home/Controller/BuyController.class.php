<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 *
 * 进货controller
 */

namespace Home\Controller;

use Think\Controller;
use Think\Page;

class BuyController extends BaseController
{
    public function index()
    {
        $buyModel = M('buy');
        $where = 'status = 1';
        $startTime = I('start_time');
        $endTime = I('end_time');
        $searchName = I('search_name');

        if ($searchName){
            $where .= " and dealer_name like'%".$searchName."%'";
        }

        if ($startTime && $endTime){
            $where .= " and add_time between '".$startTime."' and '".$endTime."'";
        }

        $buyAllInfo = $buyModel->where($where)->select();

        $count = count($buyAllInfo);

        $Page = new Page($count);// 实例化分页类 传入总记录数
        $show = $Page->show_self();// 分页显示输出

        $buyInfo = $buyModel->where($where)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

        $this->assign('page', $show);
        $this->assign('buyAllInfo', $buyInfo);
        $this->display('Buy/index');
    }

    public function addBuy()
    {
        $date = date('Y-m-d');
        $this->assign('date', $date);
        $this->display('Buy/add');
    }

    public function edit()
    {
        $buyModel = M('buy');
        $buyProjectModel = M('buy_project');
        $projectModel = M('project');

        //插入销售总表
        $buyData = [
            'dealer_id' => I('dealerId'),
            'dealer_name' => I('dealerName'),
            'money_total' => I('moneyTotal'),
            'number_total' => I('numberTotal'),
            'add_time' => date('Y-m-d H:i:s'),
        ];

        $buyId = $buyModel->add($buyData);

        $number = $_POST['number'];
        foreach ($number as $k => $v) {
            if ($v > 0) {
                $projectId = I('projectId_' . ($k + 1));
                //修改产品数量
                $projectInfo = $projectModel->where(['id' => I('projectId_' . ($k + 1))])->find();
                $num = intval($projectInfo['number']) + intval($v);

                $res = $projectModel->where(['id' => $projectId])->save(['number' => $num]);
                //插入销售关系表

                $buyProjectData = [
                    'buy_id' => $buyId,
                    'project_id' => I('projectId_' . ($k + 1)),
                    'number' => $v,
                    'price' => $_POST['price'][$k],
                    'money' => $_POST['money'][$k],
                    'buy_type' => $_POST['type_buy'][$k],
                    'remark' => $_POST['remark'][$k],
                    'add_time' => date('Y-m-d H:i:s'),
                ];
                $buyProjectId = $buyProjectModel->add($buyProjectData);
            }
        }

        redirect('/Home/Buy/index');
    }

    /**
     * 详情页
     */
    public function detail()
    {
        $id = I('buyId');
        $buyModel = M('buy');
        $buyProjectModel = M('buy_project');
        $projectModel = M('project');
        $dealerModel = M('dealer');

        $buyInfo = $buyModel->where(['id' => $id])->find();
        $buyInfo['add_time'] = substr($buyInfo['add_time'],0,10);
        $dealerInfo = $dealerModel->where(['id'=>$buyInfo['dealer_id']])->find();

        $buyProjectInfo = $buyProjectModel->where(['buy_id' => $id])->select();

        $count = 4 - count($buyProjectInfo);

        foreach ($buyProjectInfo as $k => $v) {
            $projectInfo = $projectModel->where(['id' => $v['project_id']])->find();
            $buyProjectInfo[$k]['projectName'] = $projectInfo['name'];
            $buyProjectInfo[$k]['standard'] = $projectInfo['standard'];
            $buyProjectInfo[$k]['unit'] = $projectInfo['unit'];
        }

        $this->assign('count', $count);
        $this->assign('buyInfo', $buyInfo);
        $this->assign('dealerInfo', $dealerInfo);
        $this->assign('buyProjectInfo', $buyProjectInfo);
        $this->display('Buy/detail');
    }

    /**
     * 软删除
     */
    public function del(){
        $id = I('buyId');
        $buyModel = M('buy');
        $result = $buyModel->where(['id' => $id])->save(['status' => 2]);
        redirect(U('Buy/index'));
    }
}