<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;

class UnitController extends BaseController
{
    public function index()
    {
        $unitModel = M('unit');
        $unitInfo = $unitModel->select();
        $count = count($unitInfo);
        $this->assign('count', $count);
        $this->assign('unitInfo', $unitInfo);
        $this->display('Unit/index');
    }

    /**
     * 新增、修改操作
     */
    public function edit()
    {
        $unitId = I('unitId');
        $data['name'] = I("name");
        $data['add_time'] = date("Y-m-d H:i:s");
        $unitModel = M('unit');
        if ($unitId > 0) {
            $rel = $unitModel->where(['id'=>$unitId])->save($data);
        } else {
            $rel = $unitModel->add($data);
        }

        redirect(U('Unit/index'));
    }

}
