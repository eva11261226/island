<?php
/**
 *
 * PHP Version 5.4
 *
 * @author eva
 */

namespace Home\Controller;

use Think\Controller;

class SaleController extends Controller
{
    public function index()
    {
        $this->display('Sale/index');
    }

    public function addSale()
    {
        $date = date('Y-m-d');
        $this->assign('date',$date);
        $this->display('Sale/add');
    }

    public function edit()
    {

    }

    public function del()
    {

    }
}