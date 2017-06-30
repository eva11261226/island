<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    /*登录页视图*/
    public function index()
    {
        $this->display('Login/index');
    }

    public function login()
    {
        $name = I('username');
        $pwd = md5(I('password'));

        $db = M('user');
        $admin = $db->where(['name' => $name])->find();

        if (!$admin || $admin['password'] != $pwd) {
            $this->error('账号或密码错误');
        }

        session('uid', $admin['id']);
        session('username', $admin['name']);

        $this->success('登录成功', __APP__);
    }

    public function logout()
    {
        session('uid',null);
        session('username', null);
        cookie(null);

        redirect(U('Login/index'));
    }


}