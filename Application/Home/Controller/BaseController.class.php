<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $uid = session('uid');
        if (!isset($uid) || $uid < 0){
            redirect('/Home/Login/index');
        }
        parent::__construct();
    }

}
