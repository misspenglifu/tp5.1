<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/15 0015
 * Time: 下午 3:26
 */

namespace app\admin\controller;
use think\facade\Session;
use think\facade\Cookie;
use think\Db;
use think\facade\Request;

class Loginout extends Common
{
    public function loginout()
    {
        if(Request::isGet()){
            $request=Request::get(false);
            $id=$request['id'];
            if($id==md5(1)){
                // 删除（当前作用域）
                Session::delete('username');
                //删除cookie
                Cookie::delete('username');

                $cokname=Cookie::get('username');
                $sessionname=Session::get('username');
                if(empty($cokname)&&empty($sessionname)){
                    $this->success('退出成功', '/login');
                }
            }
        }
    }


}
