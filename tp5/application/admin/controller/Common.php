<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/9/6 0006
 * Time: 上午 9:37
 */
namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\facade\Session;

class Common  extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $name=Session::get('username');
        if(empty($name)){
            $this->error('登录失败','/login');
        }
        $usname= Db::name('user')->where('username',$name)->find();
        $operationed= Db::name('role_management')->where('user_id',$usname['user_id'])->find();
        $operation=json_decode($operationed['operation'],true);
        Session::set('operation',$operation);
    }


}