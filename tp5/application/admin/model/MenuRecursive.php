<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22 0022
 * Time: 下午 2:39
 */
namespace app\admin\model;
use think\Db;

class MenuRecursive
{
    public function MenuRecursive($id)
    {
        $list = Db::name('left_menu')->select();
        foreach($list as $k=>$v){
            $zhi= Db::name('left_menu')->where('left_menu_pid',$v['left_menu_id'])->select();
            if($zhi){
                $list[$k]['zhi']=$zhi;
                foreach($zhi as $k=>$v){
                    $list[$k]['zhi']=MenuRecursive($v['left_menu_id']);
                }
                return $list;
            }
        }
    }
}