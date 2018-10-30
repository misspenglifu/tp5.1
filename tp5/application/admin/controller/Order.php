<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16 0016
 * Time: 上午 10:25
 */
namespace app\admin\controller;

class Order extends Common
{
    public function Order_list()
    {



        return view('order_list');
    }
    public function Order_add()
    {



        return view('order_add');
    }


}