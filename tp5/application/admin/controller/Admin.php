<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/16 0016
 * Time: 上午 9:43
 */
namespace app\admin\controller;
use think\facade\Session;
use think\Cookie;
use think\Db;
use think\facade\Request;
class Admin extends Common
{
    public function admin_list()
    {
        if(Request::isAjax()){
            $request=Request::post(false);
            if($request['val1']=='a'){
                $data['state']=1;
                $requesta=Db::name('user')->where('user_id',$request['id'])->update($data);
                if($requesta){
                   echo 1;die;
                }
            }else if($request['val1']=='b'){
                $data['state']=2;
                $requesta=Db::name('user')->where('user_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='c'){
                $requestc=Db::name('user')->where('user_id',$request['id'])->delete();
                if($requestc){
                    echo 1;die;
                }
            }else{
                $requestd=Db::name('user')->delete($request['val1']);
                if($requestd){
                    echo 1;die;
                }
            }
        }

        if(Request::isGet()){
            $request=Request::get(false);
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


            //        $list = Db::name('user')->order('user_id', 'desc')->paginate(1);
            //       // 把分页数据赋值给模板变量list
            $list = Db::name('user')->order(['user_id'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $page = $list->render();

            //print_r($list);die;
            $this->assign('page', $page);
            $this->assign('list',$list);
        }

        return view('admin_list');
    }

    public function admin_cate()
    {
        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                $request['state']=1;
                $request['type_id']=5;
                unset($request['_method']);
                $result=Db::name('left_menu')->insert($request);
                if($result){
                    echo 1;die;
                }
            }else{
                $request=Request::post(false);
                if($request['val1']=='a'){
                    $data['state']=1;
                    $requesta=Db::name('left_menu')->where('left_menu_id',$request['id'])->update($data);
                    if($requesta){
                        $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->update($data);
                        if($requestazhi){
                            echo 1;die;
                        }
                    }
                }else if($request['val1']=='b'){
                    $data['state']=2;
                    $requesta=Db::name('left_menu')->where('left_menu_id',$request['id'])->update($data);
                    if($requesta){
                        $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->update($data);
                        if($requestazhi){
                            echo 1;die;
                        }
                    }
                }else if($request['val1']=='c'){
                    $requestc=Db::name('left_menu')->where('left_menu_id',$request['id'])->delete();
                    if($requestc){
                        $requestazhi = Db::name('left_menu')->where('left_menu_pid', $request['id'])->delete();
                        if($requestazhi){
                            echo 1;die;
                        }
                    }
                }else{
                    $requestd=Db::name('left_menu')->delete($request['val1']);
                    if($requestd){
                        foreach($request['val1'] as $k=>$v) {
                            $requestazhi = Db::name('left_menu')->where('left_menu_pid',$v)->delete();
                        }
                        if($requestazhi){
                            echo 1;die;
                        }
                    }
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
            $list = Db::name('left_menu')->where('left_menu_pid',0)->order(['left_menu_id'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $page = $list->render();
            //print_r($list);die;
            $this->assign('page', $page);
            $this->assign('list',$list);
        }




        return view('admin_cate');
    }

    public function admin_role()
    {
        if(Request::isAjax()){
            $request=Request::post(false);
            if($request['val1']=='a'){
                $data['state']=1;
                $requesta=Db::name('role_management')->where('role_management_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='b'){
                $data['state']=2;
                $requesta=Db::name('role_management')->where('role_management_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='c'){
                $requestc=Db::name('role_management')->where('role_management_id',$request['id'])->delete();
                if($requestc){
                    echo 1;die;
                }
            }else{
                $requestd=Db::name('role_management')->delete($request['val1']);
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


            $listall = Db::name('role_management')->order(['role_management_id'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $page = $listall->render();
            $this->assign('page', $page);
            $this->assign('listall',$listall);
        }



        return view('admin_role');
    }

    public function admin_rule()
    {

        if(Request::isAjax()){
            $request=Request::post(false);
            if(!empty($request['id'])){
                $listzhi= Db::name('left_menu')->where('left_menu_pid',$request['id'])->select();
                echo json_encode($listzhi);die;
            }else{

                $listzhi= Db::name('rights_management')->where('left_menu_zid',$request['left_menu_zid'])->find();
                if($listzhi){
                    echo 2;die;
                }else{
                    $liszi= Db::name('left_menu')->where('left_menu_id',$request['left_menu_zid'])->find();
                    $data['left_menu_id']=$request['left_menu_id'];
                    $data['left_menu_zid']=$liszi['left_menu_id'];
                    $data['state']=2;
                    $data['date']=time();
                    $data['access_rules']=$liszi['menu_address'];
                    $data['type_id']=17;
                    $data['management_name']=$request['management_name'];
                    $rusult = Db::name('rights_management')->insert($data);
                    if($rusult){
                        echo 1;die;
                    }
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


            $list = Db::name('left_menu')->where('left_menu_pid',0)->select();
            foreach($list as $k=>$v){
                $list[$k]['zhi'] = Db::name('left_menu')->where('left_menu_pid',$v['left_menu_id'])->select();
            }
            $this->assign('list',$list);


            $listall = Db::name('rights_management')->order(['rights_management_id'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $page = $listall->render();
            $this->assign('page', $page);
            $this->assign('listall',$listall);

        }

        return view('admin_rule');
    }
    public function admin_add()
    {

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                $request['password']=md5($request['password']);
                unset($request['repass']);
                unset($request['_method']);
                $result=Db::name('user')->insert($request);
                if($result){
                    echo 1;die;
                }
             }
        }

        return view('admin_add');
    }
    public function admin_ruleadd()
    {
        if (Request::isAjax())
        {
            $requestg=Request::post(false);
            $requestg['date']=time();
            $requestg['type_id']=18;
            $left_menu['left_menu_id']= $requestg['left_menu_id'];
            $left_menu['rights_management_id']= $requestg['rights_management_id'];
            $requestg['haverule']=json_encode($left_menu);
            unset($requestg['left_menu_id']);
            unset($requestg['rights_management_id']);
            $requestg['operation']=json_encode($requestg['operation']);
            $list=Db::name('role_management')->where('user_id',$requestg['user_id'])->find();
            if(empty($list)){
                $result=Db::name('role_management')->insert($requestg);
                if($result){
                    $daterole['role']=$requestg['rolename'];
                    $listresuelt=Db::name('user')->where('user_id',$requestg['user_id'])->update($daterole);
                    if($listresuelt){
                        echo 1;die;
                    }
                }
            }else{
                echo 2;die;
            }
        }

        $list=Db::name('user')->select();
        $this->assign('list',$list);

        $listm = Db::name('left_menu')->where('left_menu_pid',0)->select();
        foreach($listm as $k=>$v){
            $listm[$k]['zhi']= Db::name('rights_management')->where('left_menu_id',$v['left_menu_id'])->select();
        }
        //dump($listm);die;
        $this->assign('listm',$listm);

        return view('admin_ruleadd');
    }
    public function admin_edit()
    {
         if(Request::isGet()){
             $request=Request::get(false);
             $id=$request['id'];
             $list=Db::name('user')->where('user_id',$id)->find();
             $this->assign('list',$list);
         }

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $requestg=Request::post(false);
                $requestg['date']=time();
                $requestg['password']=md5($requestg['password']);
                $requestg['role']=json_encode($requestg['role']);
                unset($requestg['repass']);
                unset($requestg['_method']);
                $userid=$requestg['user_id'];
                unset($requestg['user_id']);
                $result=Db::name('user')->where('user_id',$userid)->update($requestg);
                if($result){
                    echo 1;die;
                }
            }
        }
        return view('admin_edit');
    }

    public function admin_editdd()
    {
        if (Request::isAjax())
        {
            $requestg=Request::post(false);
            $requestg['date']=time();
            $left_menu['left_menu_id']= $requestg['left_menu_id'];
            $left_menu['rights_management_id']= $requestg['rights_management_id'];
            $requestg['haverule']=json_encode($left_menu);
            unset($requestg['left_menu_id']);
            unset($requestg['rights_management_id']);
            $requestg['operation']=json_encode($requestg['operation']);
            $result=Db::name('role_management')->where('user_id',$requestg['user_id'])->update($requestg);
            if($result){
                $daterole['role']=$requestg['rolename'];
                $listresuelt=Db::name('user')->where('user_id',$requestg['user_id'])->update($daterole);
                if(isset($listresuelt)){
                    echo 1;die;
                }
            }
        }

        if(Request::isGet()){
            $request=Request::get(false);
            $id=$request['id'];
            $listname=Db::name('role_management')->where('role_management_id',$id)->find();
            $this->assign('listname',$listname);

            $harole=json_decode($listname['haverule'],true);
            $left_menu_id=$harole['left_menu_id'];
            $rights_management_id=$harole['rights_management_id'];

            $this->assign('left_menu_id',$left_menu_id);
            $this->assign('rights_management_id',$rights_management_id);

            $operation=json_decode($listname['operation'],true);
            $this->assign('operation',$operation);


            $list=Db::name('user')->where('user_id',$listname['user_id'])->select();
            $this->assign('list',$list);

            $listm = Db::name('left_menu')->where('left_menu_pid',0)->select();
            foreach($listm as $k=>$v){
                $listm[$k]['zhi']= Db::name('rights_management')->where('left_menu_id',$v['left_menu_id'])->select();
            }

            $this->assign('listm',$listm);
        }

        return view('admin_editdd');
    }

    public function admin_ruleedit(){
        if(Request::isGet()) {
            $request = Request::get(false);
            $id = $request['id'];
            $list= Db::name('rights_management')->where('rights_management_id', $id)->find();
            $this->assign('list',$list);
        }

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $requestg=Request::post(false);
                $requestg['date']=time();
                unset($requestg['_method']);
                $userid=$requestg['rights_management_id'];
                unset($requestg['rights_management_id']);
                $result=Db::name('rights_management')->where('rights_management_id',$userid)->update($requestg);
                if($result){
                    echo 1;die;
                }
            }
        }
        return view('admin_ruleedit');

    }



}
