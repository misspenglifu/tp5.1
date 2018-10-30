<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/22 0022
 * Time: 上午 11:48
 */
namespace app\admin\controller;
use think\facade\Session;
use think\Cookie;
use think\Db;
use think\Controller;
use think\facade\Request;


class Menu extends Common
{
    public function Menu()
    {

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                $request['state']=1;
                $request['type_id']=5;
                $request['left_menu_pid']=0;
                $resultlast=Db::name('left_menu')->order('left_menu_id','desc')->find();
                $menuaddress=Db::name('left_menu')->where('left_menu_pid', 0)->order('left_menu_id','desc')->find();
                $request['menu_path']=$menuaddress['menu_path']+1;
                $request['menu_address']=$menuaddress['menu_address']+1;
                $request['level_id']=$resultlast['level_id']+1;
                unset($request['_method']);
                $result=Db::name('left_menu')->insert($request);
                if($result){
                    echo 1;die;
                }
            }
        }

        if(Request::isAjax()){
            $request=Request::post(false);
            if($request['val1']=='a') {
                $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->find();
                if ($requesta['state'] == 1) {
                    if ($requesta['left_menu_pid'] == 0) {
                        $data['state'] = 2;
                        $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->update($data);
                        if ($requestazhi) {
                            $data['state'] = 2;
                            $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->update($data);
                            if ($requesta) {
                                echo 1;
                                die;
                            }
                        }
                    } else {
                        $data['state'] = 2;
                        $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->update($data);
                        if ($requesta) {
                            echo 1;
                            die;
                        }
                    }
                } else {
                    if ($requesta['left_menu_pid'] == 0) {
                        $data['state'] = 1;
                        $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->update($data);
                        if ($requestazhi) {
                            $data['state'] = 1;
                            $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->update($data);
                            if ($requesta) {
                                echo 1;
                                die;
                            }
                        }
                    } else {
                        $data['state'] = 1;
                        $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->update($data);
                        if ($requesta) {
                            echo 1;
                            die;
                        }
                    }
                }
            }else if($request['val1']=='a'){
                $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->find();
                if ($requesta['left_menu_pid'] == 0) {
                    $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->delete();
                    if ($requestazhi) {
                        $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->delete();
                        if ($requesta) {
                            echo 1;
                            die;
                        }
                    }
                } else {
                    $requesta = Db::name('left_menu')->where('left_menu_id', $request['id'])->delete();
                    if ($requesta) {
                        echo 1;
                        die;
                    }
                }
            }else{
                $requestd=Db::name('left_menu')->delete($request['val1']);
                if($requestd){
                    echo 1;die;
                }
            }
        }


        if(Request::isGet()) {
            $request = Request::get(false);
            if(!empty($request['left_id'])) {
                $id = $request['left_id'];
                $operation = Session::get('operation');
                foreach ($operation as $k => $v) {
                    $leftmeunid[] = $k;
                }
                if (in_array($id, $leftmeunid)) {
                    $permissions_exist = $operation[$id];
                } else {
                    $permissions_exist = 0;
                }
                $this->assign('permissions_exist', $permissions_exist);
            }
            $list = Db::name('left_menu')->select();
            $this->assign('list', $list);
        }


        return view('menu');
    }

    public function Menu_add()
    {
        if(Request::isGet()){
            $request=Request::get(false);
            $id=$request['id'];
            $this->assign('id', $id);
        }

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                $request['state']=1;
                $request['type_id']=5;
                $resultlast=Db::name('left_menu')->order('left_menu_id','desc')->find();
                $request['level_id']=$resultlast['level_id']+1;
                unset($request['_method']);
                $result=Db::name('left_menu')->insert($request);
                if($result){
                    echo 1;die;
                }
            }
        }
        return view('menu_add');
    }

    public function Menu_edit()
    {
        if(Request::isGet()){
            $request=Request::get(false);
            $id=$request['id'];
            $list=Db::name('left_menu')->where('left_menu_id',$id)->find();
            $this->assign('list', $list);
        }

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $id=$request['left_menu_id'];
                unset($request['left_menu_id']);
                unset($request['_method']);
                $result=Db::name('left_menu')->where('left_menu_id',$id)->update($request);
                if($result){
                    echo 1;die;
                }
            }
        }

        return view('menu_edit');
    }


}