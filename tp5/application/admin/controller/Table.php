<?php
/**
 * Created by PhpStorm.
 * User: penglifu
 * Date: 2018/8/20 0020
 * Time: 下午 2:28
 */

namespace app\admin\controller;
use think\facade\Session;
use think\Cookie;
use think\Db;
use think\Controller;
use think\facade\Request;

class Table extends Common
{
    /*
    * New database table
    * */
    public function table()
    {
        if(Request::isAjax()) {
            $request=Request::post(false);
            if($request['val1']=='c'){
                $requestc=Db::name('type_classify')->where('type_id',$request['id'])->find();
                $sql='DROP TABLE IF EXISTS thinkphp_'.$requestc['table_name'].';';
                $raulutqury=Db::execute($sql);
                if(isset($raulutqury)){
                    $requesta=Db::name('type_classify')->where('type_id',$request['id'])->delete();
                    if($requesta){
                        $requestf=Db::name('input')->where('type_id',$request['id'])->find();
                        if($requestf){
                            $requestd=Db::name('input')->where('type_id',$request['id'])->delete();
                            if($requestd){
                                echo 1;die;
                            }
                        }else{
                            echo 1;die;
                        }
                    }
                }
            }else if($request['val1']=='a'){
                $data['state']=1;
                $requesta=Db::name('type_classify')->where('type_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='b'){
                $data['state']=2;
                $requesta=Db::name('type_classify')->where('type_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else{
                foreach($request['val1'] as $k=>$v){
                    $requestcall=Db::name('type_classify')->where('type_id',$v)->find();
                    $sql='DROP TABLE IF EXISTS thinkphp_'.$requestcall['table_name'].';';
                    $raulutquryall=Db::execute($sql);
                    if(isset($raulutquryall)){
                        $requestf=Db::name('input')->where('type_id',$v)->find();
                        if($requestf){
                            Db::name('input')->where('type_id',$v)->delete();
                        }
                    }
                }
                if($raulutquryall){
                    $requesta=Db::name('type_classify')->delete($request['val1']);
                    if($requesta){
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

            $list = Db::name('type_classify')->order(['date'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $page = $list->render();
            $this->assign('page', $page);
            $this->assign('list',$list);
            return view('table');
        }

    }


    /*
    * New database tables
    * */
    public function table_add()
    {
        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                $request['state']=1;
                unset($request['repass']);
                unset($request['_method']);
                $result=Db::name('type_classify')->insert($request);
                if($result){
                            $sql='
                            CREATE TABLE thinkphp_'.$request['table_name'].' (
                            '.$request['table_name'].'_id int(50) NOT NULL AUTO_INCREMENT,
                            type_id int(10) NOT NULL,
                            date int(10) NOT NULL,
                            PRIMARY KEY ('.$request['table_name'].'_id)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
                    $raulutqury=Db::execute($sql);
                    if(isset($raulutqury)){
                        echo 1;die;
                    }
                }
            }
        }


        return view('table_add');
    }


    /*
    * Database table deletion
    * */
    public function table_edit()
    {
        if(Request::isGet()){
            $requesti=Request::get(false);
            $id=$requesti['id'];
            $list = Db::name('input')->where('type_id',$id)->select();
            $this->assign('list', $list);
        }

        if (Request::isAjax())
        {
            $request=Request::post(false);
            if($request['val1']=='c'){
                $requestc=Db::name('input')->where('input_id',$request['id'])->find();
                $type_id=$requestc['type_id'];
                $requestct=Db::name('type_classify')->where('type_id',$type_id)->find();
                $tablename='thinkphp_'.$requestct['table_name'];
                $sql='ALTER TABLE '.$tablename.' drop column '.$requestc['form_name'];
                $raulutqury=Db::execute($sql);
                if(isset($raulutqury)){
                    $request=Db::name('input')->where('input_id',$request['id'])->delete();
                    if($request){
                        echo 1;die;
                    }
                }
            }else if($request['val1']=='a'){
                $data['state']=1;
                $requesta=Db::name('input')->where('input_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='b'){
                $data['state']=2;
                $requesta=Db::name('input')->where('input_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }
        }




        return view('table_edit');
    }

    /*
     * Database table modification
     * */
    public function table_add_listing()
    {
        if(Request::isGet()){
            $requesti=Request::get(false);
            $id=$requesti['id'];
            $this->assign('id',$id);
            $list = Db::name('input')->where('input_id',$id)->find();

            $this->assign('list', $list);
        }
        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                unset($request['_method']);
                $reusltype=Db::name('input')->where('input_id',$request['input_id'])->find();
                $result=Db::name('input')->where('input_id',$request['input_id'])->update($request);
                if(isset($result)){
                    $reusl=Db::name('input_data')->where('input_data_id',$request['input_data_id'])->find();
                    if($reusl['value']=='longtext'){
                        $field_type=$reusl['value'];
                    }else{
                        $field_type=$reusl['value'].'('.$request['data_length'].')';
                    }
                    $reuslty=Db::name('type_classify')->where('type_id',$reusltype['type_id'])->find();
                    $sql='ALTER TABLE thinkphp_'.$reuslty['table_name'].' change '.$reusltype['form_name'].' '.$request['form_name'].' '.$field_type.' NULL';
                    $raulutqury=Db::execute($sql);
                    if(isset($raulutqury)){
                        echo 1;die;
                    }
                }
            }
        }

        $list1 = Db::name('input_type')->select();
        $this->assign('list1', $list1);
        $list2 = Db::name('input_data')->select();
        $this->assign('list2', $list2);
        return view('table_add_listing');
    }

    public function table_add_table(){

        if(Request::isGet()){
            $requesti=Request::get(false);
            $id=$requesti['id'];
            $this->assign('id',$id);
        }

        if (Request::isAjax())
        {
            if(Request::isPut())
            {
                $request=Request::post(false);
                $request['date']=time();
                unset($request['_method']);
                $result=Db::name('input')->insert($request);
                if($result){
                    $reusl=Db::name('input_data')->where('input_data_id',$request['input_data_id'])->find();
                    if($reusl['value']=='longtext'){
                        $field_type=$reusl['value'];
                    }else{
                        $field_type=$reusl['value'].'('.$request['data_length'].')';
                    }
                    $reuslty=Db::name('type_classify')->where('type_id',$request['type_id'])->find();
                    $sql='ALTER TABLE thinkphp_'.$reuslty['table_name'].' add '.$request['form_name'].' '.$field_type;
                    $raulutqury=Db::execute($sql);
                    if(isset($raulutqury)){
                        echo 1;die;
                    }
                }
            }
        }

        $list1 = Db::name('input_type')->select();
        $this->assign('list1', $list1);
        $list2 = Db::name('input_data')->select();
        $this->assign('list2', $list2);
        return view('table_add_table');
    }




}