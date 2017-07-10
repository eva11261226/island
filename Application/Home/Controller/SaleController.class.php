<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;
use Think\Page;

class SaleController extends BaseController
{
    public function index()
    {
        $saleModel = M('sale');
        $where = 'status = 1';
        $startTime = $_POST['start_time'];

        $endTime = $_POST['end_time'];
        $searchName = I('search_name');

        if ($searchName){
            $where .= " and dealer_name like'%".$searchName."%'";
        }

        if ($startTime && $endTime){
            $where .= " and add_time between '".$startTime."' and '".$endTime."'";
        }

        $saleAllInfo = $saleModel->where($where)->select();

        $count = count($saleAllInfo);

        $Page = new Page($count);// 实例化分页类 传入总记录数
        $show = $Page->show_self();// 分页显示输出

        $saleInfo = $saleModel->where($where)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条


        $this->assign('page', $show);
        $this->assign('saleAllInfo', $saleInfo);
        $this->assign('searchName', $searchName);
        $this->assign('startTime', $startTime);
        $this->assign('endTime', $endTime);
        $this->display('Sale/index');
    }

    public function addSale()
    {
        $date = date('Y-m-d');
        $this->assign('date', $date);
        $this->display('Sale/add');
    }

    public function edit()
    {
        $saleModel = M('sale');
        $saleProjectModel = M('sale_project');
        $projectModel = M('project');

        //插入销售总表
        $saleData = [
            'dealer_id' => I('dealerId'),
            'dealer_name' => I('dealerName'),
            'money_total' => I('moneyTotal'),
            'number_total' => I('numberTotal'),
            'add_time' => date('Y-m-d H:i:s'),
        ];

        $saleId = $saleModel->add($saleData);

        $number = $_POST['number'];
        foreach ($number as $k => $v) {
            if ($v > 0) {
                $projectId = I('projectId_' . ($k + 1));
                //修改产品数量
                $projectInfo = $projectModel->where(['id' => I('projectId_' . ($k + 1))])->find();
                $num = intval($projectInfo['number']) - intval($v);

                if ($num < 0) {
                    $saleModel->where(['id' => $saleId])->delete();
                    $this->error($projectInfo['name'] . '库存不足！');
                }
                $res = $projectModel->where(['id' => $projectId])->save(['number' => $num]);
                //插入销售关系表

                $saleProjectData = [
                    'sale_id' => $saleId,
                    'project_id' => I('projectId_' . ($k + 1)),
                    'number' => $v,
                    'price' => $_POST['price'][$k],
                    'money' => $_POST['money'][$k],
                    'sale_type' => $_POST['type_sale'][$k],
                    'remark' => $_POST['remark'][$k],
                    'add_time' => date('Y-m-d H:i:s'),
                ];
                $saleProjectId = $saleProjectModel->add($saleProjectData);

            }
        }

        redirect('/Home/Sale/index');
    }

    /**
     * 详情页
     */
    public function detail()
    {
        $id = I('saleId');
        $saleModel = M('sale');
        $saleProjectModel = M('sale_project');
        $projectModel = M('project');
        $dealerModel = M('dealer');

        $saleInfo = $saleModel->where(['id' => $id])->find();
        $saleInfo['add_time'] = substr($saleInfo['add_time'],0,10);
        $dealerInfo = $dealerModel->where(['id'=>$saleInfo['dealer_id']])->find();

        $saleProjectInfo = $saleProjectModel->where(['sale_id' => $id])->select();

        $count = 4 - count($saleProjectInfo);

        foreach ($saleProjectInfo as $k => $v) {
            $projectInfo = $projectModel->where(['id' => $v['project_id']])->find();
            $saleProjectInfo[$k]['projectName'] = $projectInfo['name'];
            $saleProjectInfo[$k]['standard'] = $projectInfo['standard'];
            $saleProjectInfo[$k]['unit'] = $projectInfo['unit'];
        }

        $this->assign('count', $count);
        $this->assign('saleInfo', $saleInfo);
        $this->assign('dealerInfo', $dealerInfo);
        $this->assign('saleProjectInfo', $saleProjectInfo);
        $this->display('Sale/detail');
    }

    /**
     * 软删除
     */
    public function del(){
        $id = I('saleId');
        $saleModel = M('sale');
        $result = $saleModel->where(['id' => $id])->save(['status' => 2]);
        redirect(U('Sale/index'));
    }
}