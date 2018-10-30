<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4 0004
 * Time: 下午 1:42
 */
namespace app\admin\controller;

use think\facade\Session;
use think\Cookie;
use think\Db;
use think\Controller;
use think\facade\Request;
use think\image;
use think\facade\Env;

class Product extends Common
{
    public function product()
    {
        if(Request::isAjax()){
            $request=Request::post(false);
            if($request['val1']=='a'){
                $data['state']=1;
                $requesta=Db::name('product')->where('product_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='b'){
                $data['state']=2;
                $requesta=Db::name('product')->where('product_id',$request['id'])->update($data);
                if($requesta){
                    echo 1;die;
                }
            }else if($request['val1']=='c'){
                $productd=Db::name('product')->where('product_id',$request['id'])->find();
                $original_path=json_decode($productd['original_path']);
                $thumb_path=json_decode($productd['thumb_path']);
                $water_path=json_decode($productd['water_path']);
                foreach ($original_path as $k=>$v){
                    if (file_exists(Env::get('root_path').'public'.$original_path[$k])){
                        unlink(Env::get('root_path').'public'.$original_path[$k]);
                    }
                }
                foreach ($thumb_path as $k=>$v){
                    if (file_exists(Env::get('root_path').'public'.$thumb_path[$k])){
                        unlink(Env::get('root_path').'public'.$thumb_path[$k]);
                    }
                }
                foreach ($water_path as $k=>$v){
                    if (file_exists(Env::get('root_path').'public'.$water_path[$k])){
                        unlink(Env::get('root_path').'public'.$water_path[$k]);
                    }
                }
                $requestc=Db::name('product')->where('product_id',$request['id'])->delete();
                if($requestc){
                    echo 1;die;
                }
            }else{
                $rusltall=Db::name('product')->where('product_id','in',$request['val1'])->select();
                foreach($rusltall as $k1=>$v1){
                    $original_path=json_decode($v1['original_path']);
                    $thumb_path=json_decode($v1['thumb_path']);
                    $water_path=json_decode($v1['water_path']);
                    foreach ($original_path as $k=>$v){
                        if (file_exists(Env::get('root_path').'public'.$original_path[$k])){
                            unlink(Env::get('root_path').'public'.$original_path[$k]);
                        }
                    }
                    foreach ($thumb_path as $k=>$v){
                        if (file_exists(Env::get('root_path').'public'.$thumb_path[$k])){
                            unlink(Env::get('root_path').'public'.$thumb_path[$k]);
                        }
                    }
                    foreach ($water_path as $k=>$v){
                        if (file_exists(Env::get('root_path').'public'.$water_path[$k])){
                            unlink(Env::get('root_path').'public'.$water_path[$k]);
                        }
                    }
                }
                $requestd=Db::name('product')->delete($request['val1']);
                if($requestd){
                    echo 1;die;
                }
            }
        }


        if(Request::isGet()) {
            $request = Request::get(false);
            if(!empty($request['left_id'])){
                $id = $request['left_id'];
                $operation = Session::get('operation');
                foreach ($operation as $k => $v) {
                    $leftmeunid[]=$k;
                }
                if (in_array($id,$leftmeunid)) {
                    $permissions_exist = $operation[$id];
                }else{
                    $permissions_exist=0;
                }
                $this->assign('permissions_exist', $permissions_exist);
            }

            $list = Db::name('product')->order(['date'=>'desc'])->paginate(10,false,['query' => ['left_id'=>$id]]);
            $itmes=$list->items();
            foreach ($itmes as $k => $v){
                $itmes[$k]['thumb_path']=json_decode($v['thumb_path'],true);
            }
            $page = $list->render();
            $this->assign('page', $page);
            $this->assign('list',$itmes);


        }


        return view('product');
    }


    public function product_add(){

        if (Request::isAjax())
        {
            $request=Request::post(false);
            $image = request()->file('file');
            $check_image=$request['check_image'];
            foreach($image as $k=>$v){
                if(!in_array($k,$check_image)){
                    unset($image[$k]);
                }
            }
             $original_path=[];
             $thumb_path=[];
             $water_path=[];
             foreach($image as $k=>$v){
                 $info = $v->move(Env::get('root_path') . 'public\uploads');

                 //dump($info);die;
                 //$imagespath=$info->getPathName();

                 $images=$info->getFilename();
                 $string_arr = explode(".", $images);
                 $time=date('Ymd/',time());
                 $timeo=date('Ymd',time());
                 $image = \think\Image::open(Env::get('root_path') . 'public/uploads/'. $time .$images);
                 $image->thumb(150,150,\think\Image::THUMB_SCALING)->save('./uploads/'.$timeo.'/'.$string_arr[0].'thumb.png');
                 $image->text('十年磨一剑',Env::get('root_path').'HYQingKongTiJ.ttf',10,'#ffffff')->save('./uploads/'.$timeo.'/'.$string_arr[0].'water.png');
                 $original_path[]='/uploads/'. $time .$images;
                 $thumb_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'thumb.png';
                 $water_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'water.png';
              }
           $request['original_path']=json_encode($original_path);
           $request['thumb_path']=json_encode($thumb_path);
           $request['water_path']=json_encode($water_path);
           $request['parameter']=json_encode($request['parameter']);
           $request['state']=1;
           $request['date']=time();
           $request['type_id']=21;
           unset($request['check_image']);
           unset($request['_method']);
           $result=Db::name('product')->insert($request);
            if($result){
                echo 1;die;
            }
        }

 //普通input框提交处理
//       if(Request::isPut()){
//           $request=Request::post(false);
//           $image =request()->file('images');
//             $original_path=[];
//             $thumb_path=[];
//             $water_path=[];
//             foreach($image as $k=>$v){
//                 $info = $v->move(Env::get('root_path') . 'public\uploads');
//
//                 //dump($info);die;
//                 //$imagespath=$info->getPathName();
//
//                 $images=$info->getFilename();
//                 $string_arr = explode(".", $images);
//                 $time=date('Ymd/',time());
//                 $timeo=date('Ymd',time());
//                 $image = \think\Image::open(Env::get('root_path') . 'public/uploads/'. $time .$images);
//                 $image->thumb(150,150,\think\Image::THUMB_SCALING)->save('./uploads/'.$timeo.'/'.$string_arr[0].'thumb.png');
//                 $image->text('十年磨一剑',Env::get('root_path').'HYQingKongTiJ.ttf',10,'#ffffff')->save('./uploads/'.$timeo.'/'.$string_arr[0].'water.png');
//                 $original_path[]='/uploads/'. $time .$images;
//                 $thumb_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'thumb.png';
//                 $water_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'water.png';
//              }
//           $request['original_path']=json_encode($original_path);
//           $request['thumb_path']=json_encode($thumb_path);
//           $request['water_path']=json_encode($water_path);
//           $request['parameter']=json_encode($request['parameter']);
//           $request['state']=1;
//           $request['date']=time();
//           $request['type_id']=21;
//           unset($request['check_image']);
//           unset($request['_method']);
//           $result=Db::name('product')->insert($request);
//           if($result){
//               $this->success('上传成功','product');
//           }
//       }
        return view('product_add');

    }

    public function product_edit(){
        if (Request::isAjax())
        {
            $request=Request::post(false);
            $image = request()->file('file');
            $check_image=$request['check_image'];
            $check_image_new=$request['check_image_new'];
            $listname=Db::name('product')->where('product_id',$request['product_id'])->find();
            $original_path_old=json_decode($listname['original_path']);
            $thumb_path_old=json_decode($listname['thumb_path']);
            $water_path_old=json_decode($listname['water_path']);
            foreach($original_path_old as $k=>$v){
                if(!in_array($k,$check_image)){
                    if (file_exists(Env::get('root_path').'public'.$original_path_old[$k])){
                        unlink(Env::get('root_path').'public'.$original_path_old[$k]);
                    }
                    unset($original_path_old[$k]);
                }
            }
            foreach($thumb_path_old as $k=>$v){
                if(!in_array($k,$check_image)){
                    if (file_exists(Env::get('root_path').'public'.$thumb_path_old[$k])){
                        unlink(Env::get('root_path').'public'.$thumb_path_old[$k]);
                    }
                    unset($thumb_path_old[$k]);
                }
            }
            foreach($water_path_old as $k=>$v){
                if(!in_array($k,$check_image)){
                    if (file_exists(Env::get('root_path').'public'.$water_path_old[$k])){
                        unlink(Env::get('root_path').'public'.$water_path_old[$k]);
                    }
                    unset($water_path_old[$k]);
                }
            }

            foreach($image as $k=>$v){
                if(!in_array($k,$check_image_new)){
                    unset($image[$k]);
                }
            }
            $original_path=[];
            $thumb_path=[];
            $water_path=[];
            foreach($image as $k=>$v){
                $info = $v->move(Env::get('root_path') . 'public\uploads');

                //dump($info);die;
                //$imagespath=$info->getPathName();

                $images=$info->getFilename();
                $string_arr = explode(".", $images);
                $time=date('Ymd/',time());
                $timeo=date('Ymd',time());
                $image = \think\Image::open(Env::get('root_path') . 'public/uploads/'. $time .$images);
                $image->thumb(150,150,\think\Image::THUMB_SCALING)->save('./uploads/'.$timeo.'/'.$string_arr[0].'thumb.png');
                $image->text('十年磨一剑',Env::get('root_path').'HYQingKongTiJ.ttf',10,'#ffffff')->save('./uploads/'.$timeo.'/'.$string_arr[0].'water.png');
                $original_path[]='/uploads/'. $time .$images;
                $thumb_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'thumb.png';
                $water_path[]='/uploads/'.$timeo.'/'.$string_arr[0].'water.png';
            }
            $original_path=array_merge($original_path,$original_path_old);
            $thumb_path=array_merge($thumb_path,$thumb_path_old);
            $water_path=array_merge($water_path,$water_path_old);

            $request['original_path']=json_encode($original_path);
            $request['thumb_path']=json_encode($thumb_path);
            $request['water_path']=json_encode($water_path);
            $request['parameter']=json_encode($request['parameter']);
            $request['state']=1;
            $request['date']=time();
            $request['type_id']=21;
            unset($request['check_image_new']);
            unset($request['check_image']);
            unset($request['_method']);
            $result=Db::name('product')->where('product_id',$request['product_id'])->update($request);
            if($result){
                echo 1;die;
            }
        }


        if(Request::isGet()){
            $request=Request::get(false);
            $id=$request['id'];
            $list=Db::name('product')->where('product_id',$id)->find();
            $list['original_path']=json_decode($list['original_path']);
            $parameter=json_decode($list['parameter'],true);

            foreach ($parameter as $key => $value) {
                foreach($value as $k=>$v){

                    $result[$k][] = $v;
                }
            }
            $list['parameter_new']=$result;
            //dump($list);die;
            $this->assign('list', $list);
        }




        return view('product_edit');
    }


}