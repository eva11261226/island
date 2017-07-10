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

class DealerController extends BaseController
{
    public function index()
    {
        $dealerName = I("search_name");
        $dealerModel = M('Dealer');
        $dealerInfo = $dealerModel->select();
        $where = 'status = 1';
        if ($dealerName) {
            $where .= " and name like '%" . $dealerName . "%'";
        }
        $count = $dealerModel->count($where);
        if ($count < 1) {
            $count = 0;
        }

        $Page = new Page($count);// 实例化分页类 传入总记录数
        $show = $Page->show_self();// 分页显示输出

        $dealerInfo = $dealerModel->where($where)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('dealerInfo', $dealerInfo);
        $this->assign('dealerName', $dealerName);
        $this->display("Dealer/index");
    }


    /**
     * 新增、修改页面
     */
    public function add()
    {
        $dealerId = I('dealerId');

        $dealerInfo = [];
        if ($dealerId > 0) {
            $dealerModel = M('dealer');
            $dealerInfo = $dealerModel->where(['id' => $dealerId])->find();
        }

        $this->assign('dealerInfo', $dealerInfo);
        $this->display("Dealer/add");
    }

    /**
     * 新增、修改操作
     */
    public function edit()
    {
        $data = [];
        $data['name'] = I('name');
        $data['contact_name'] = I('contact_name');
        $data['address'] = I('address');
        $data['contact_tel'] = I('contact_tel');
        $data['type'] = I('type');
        $data['remark'] = I('remark');
        $data['add_time'] = date("Y-m-d H:i:s");
        $dealerId = I('dealerId');
        $dealerModel = M('dealer');
        if ($dealerId > 0) {
            $res = $dealerModel->where(['id' => $dealerId])->save($data);
        } else {
            $res = $dealerModel->add($data);
        }
        redirect('/Home/Dealer/index');
    }

    /**
     * 软删除
     */
    public function del()
    {
        $dealerId = I('dealerId');
        $dealerModel = M('dealer');

        $result = $dealerModel->where(['id' => $dealerId])->save(['status' => 2]);

        redirect(U('Dealer/index'));
    }

    /**
     * 验证名称是否存在
     *
     * @param name string 产品名称
     */
    public function getDealerName()
    {
        $name = I('name');
        $dealerModel = M('dealer');
        $dealerInfo = $dealerModel->where(['name' => $name])->find();
        if (!empty($dealerInfo)) {
            $this->ajaxReturn(['valid' => false]);
        } else {
            $this->ajaxReturn(['valid' => true]);
        }
    }

    /**
     * 模糊查询
     */
    public function getLikeDealers()
    {
        $name = I('name');
        $dealerModel = M('dealer');

        $where = "name like '%" . $name . "%'";

        $dealers = $dealerModel->where($where)->field('id,name,address')->select();

        $this->ajaxReturn($dealers);
    }

    public function getDealerInfo()
    {
        $id = I('id');
        $dealerModel = M('dealer');
        $dealerInfo = [];
        if ($id > 0) {
            $dealerInfo = $dealerModel->where(['id' => $id])->find();
        }

        $this->ajaxReturn($dealerInfo);
    }

}