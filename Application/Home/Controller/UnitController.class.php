<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;

class UnitController extends Controller
{
    public function index()
    {
        $unitModel = M('unit');
        $unitInfo = $unitModel->select();
        $this->assign('unitInfo',$unitInfo);
        $this->display('Unit/index');
    }

    /**
     * 新增、修改页面
     */
//    public function add()
//    {
//        $unitId = I('unitId');
//        $unitModel = M('unit');
//
//        $uniInfo = $unitModel->find(['id'=>$unitId]);
//
//        $this->display('Unit/add');
//    }

    /**
     * 新增、修改操作
     */
    public function edit()
    {
        $unitId = I('unitId');
        $data['name'] = I("name");
        $data['add_time'] = date("Y-m-d H:i:s");
        $unitModel = M('unit');
        $rel = $unitModel->add($data);

        redirect(U('Unit/index'));
    }

    /**
     * 删除
     */
    public function del()
    {
        $unitId = I('unitId');
        $unitModel = M('unit');

        $rel = $unitModel->delete($unitId);

        redirect(U('Unit/index'));
    }
}
