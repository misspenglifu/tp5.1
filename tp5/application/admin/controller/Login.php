<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/15 0015
 * Time: 下午 3:26
 */

namespace app\admin\controller;
use think\Db;
use think\Controller;
use think\facade\Request;
use think\facade\Session;
use think\facade\Cookie;

class Login extends Controller
{
   public function login()
   {
       if (Request::isAjax())
       {
           if(Request::isPut())
           {
               $requestg=Request::post(false);
               $username=$requestg['username'];
               $password=md5($requestg['password']);
               if($username && $password ){
                   $map['username'] =$username;
                   $map['password'] =$password;
                   $result=Db::name('user')->where($map)->find();
                   if(empty($result)){
                       echo 1;die;
                   }
               }
           }
       }
       if(Request::isPut())
       {
           $request=Request::post(false);
           $username=$request['username'];
           $password=md5($request['password']);
           if($username && $password ){
               $map['username'] =$username;
               $map['password'] =$password;
               $result=Db::name('user')->where($map)->find();
               if($result){
                   Session::set('username',$username);
                   // 设置Cookie 有效期为 3600秒
                   Cookie::set('username','value',3600);
                   $sename=Session::get('username');
                   if($sename){
                       $this->success('登录成功', '/admin');
                   }
               }
           }
       }

      return view('login');
   }


}