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

class ProjectController extends BaseController
{
    public function index()
    {
        $projectName = I("search_name");

        $projectModel = M('project');
        $unitModel = M('unit');
        $where = 'status = 1';
        if ($projectName) {
            $where .= " and name like '%" . $projectName . "%'";
        }
        $count = $projectModel->count($where);
        if ($count < 1) {
            $count = 0;
        }

        $Page = new Page($count);// 实例化分页类 传入总记录数
        $show = $Page->show_self();// 分页显示输出

        $projectInfo = $projectModel->where($where)->order('id')->limit($Page->firstRow . ',' . $Page->listRows)->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条

        foreach ($projectInfo as $k => $v) {
            $unitInfo = $unitModel->where(['id'=>$v['unit']])->find();
            $projectInfo[$k]['unitName'] = $unitInfo['name'];
        }

        $this->assign('page', $show);

        $this->assign('projectInfo', $projectInfo);
        $this->assign('count', $count);
        $this->assign('projectName', $projectName);
        $this->display("Project/index");
    }

    /**
     * 新增、修改页面
     */
    public function add()
    {
        $projectId = I('projectId');
        $unitModel = M('unit');
        $unitInfo = $unitModel->select();
        $projectInfo = [];
        if ($projectId > 0) {
            $projectModel = M('project');
            $projectInfo = $projectModel->where(['id' => $projectId])->find();
        }

        $this->assign('unitInfo', $unitInfo);
        $this->assign('projectInfo', $projectInfo);
        $this->display("Project/add");
    }

    /**
     * 新增、修改操作
     */
    public function edit()
    {
        $data = [];
        $data['name'] = I('name');
        $data['unit'] = I('unit');
        $data['standard'] = I('standard');
        $data['remark'] = I('remark');
        $data['add_time'] = date("Y-m-d H:i:s");
        $projectId = I('projectId');
        $projectModel = M('project');
        if ($projectId > 0) {
            $res = $projectModel->where(['id' => $projectId])->save($data);
        } else {
            $res = $projectModel->add($data);
        }
        redirect('/Home/Project/index');
    }

    /**
     * 软删除
     */
    public function del()
    {
        $projectId = I('projectId');
        $projectModel = M('project');

        $result = $projectModel->where(['id' => $projectId])->save(['status' => 2]);

        redirect(U('Project/index'));
    }

    /**
     * 验证名称是否存在
     *
     * @param name string 产品名称
     */
    public function getProjectName()
    {
        $name = I('name');
        $projectModel = M('project');
        $projectInfo = $projectModel->where(['name' => $name])->find();
        if (!empty($projectInfo)) {
            $this->ajaxReturn(['valid' => false]);
        } else {
            $this->ajaxReturn(['valid' => true]);
        }
    }


    /**
     * 模糊查询
     */
    public function getLikeProjects()
    {
        $name = I('name');
        $projectModel = M('project');

        $where = "name like '%" . $name . "%'";

        $projects = $projectModel->where($where)->field('id,name')->select();

        $this->ajaxReturn($projects);
    }


    public function getProjectInfo()
    {
        $id = I('id');
        $projectModel = M('project');
        $unitModel = M('Unit');
        $projectInfo = [];
        if ($id > 0) {
            $projectInfo = $projectModel->where(['id' => $id])->find();
            $unitInfo = $unitModel->where(['id' => $projectInfo['unit']])->find();
            $projectInfo['unitName'] = $unitInfo['name'];

        }

        $this->ajaxReturn($projectInfo);
    }
}