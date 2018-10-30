<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/15 0015
 * Time: 下午 3:26
 */

namespace app\admin\controller;
use think\Cookie;
use think\Db;
use think\Controller;
use think\facade\Session;

class Index extends Common
{
    public function index()
    {
        $name=Session::get('username');

        $listname=Db::name('user')->where('username',$name)->find();
        $userid=$listname['user_id'];
        $listname=Db::name('role_management')->where('user_id',$userid)->find();
        $harole=json_decode($listname['haverule'],true);

        $left_menu_id=$harole['left_menu_id'];
        $rights_management_id=$harole['rights_management_id'];

        $list=Db::name('left_menu')->select();
        foreach($list as $k=>$v){
            if(in_array($v['left_menu_id'],$left_menu_id)){
                $list[$k]['zhi'] = Db::name('left_menu')->where('left_menu_pid',$v['left_menu_id'])->select();
                foreach($list[$k]['zhi'] as $k1=>$v1){
                    if(!in_array($v1['left_menu_id'],$rights_management_id)){
                        unset($list[$k]['zhi'][$k1]);
                    }
                }
            }else{
                unset($list[$k]);
            }
        }
        $this->assign('name',$name);
        $this->assign('list',$list);
        $id=md5(1);
        $this->assign('id',$id);

        return view('index');
    }


}
