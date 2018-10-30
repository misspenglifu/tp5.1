<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/27 0027
 * Time: 上午 9:48
 */
namespace app\admin\controller;
use think\Cookie;
use think\Db;
use think\Controller;
use think\facade\Session;
use think\facade\Request;

class Welcome extends Common
{
    public function welcome()
    {

        if (Request::isAjax())
        {
            $requestg=Request::post(false);
            //print_r($requestg);die;
            if($requestg['zongchouproduct_id']==2){
                $quyu[]='武汉市';
            }else{
                $quyu[]='湖北';
            }
            echo json_encode($quyu);die;
        }

        $quyu['province']='湖北';
        $quyu['city']='武汉市';
        $this->assign('quyu',$quyu);


//        $reuslr=$this->getCity();
//        dump($reuslr);die;

        $name=Session::get('username');
        $this->assign('name',$name);


        $time=date("Y-m-d H:i:s",time());
        $this->assign('time',$time);
        return view('welcome');
    }


    public function getClientIP()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
                foreach ($arr AS $ip) {
                    $ip = trim($ip);
                    if ($ip != 'unknown') {
                        $realip = $ip;
                        break;
                    }
                }
                if(!isset($realip)){
                    $realip = "0.0.0.0";
                }
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $realip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        return $realip;
    }


    public function getCity()
    {
        // 获取当前位置所在城市
        $getIp = $this->getClientIP();
        //$getIp=$_SERVER["REMOTE_ADDR"];
        $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=2TGbi6zzFm5rjYKqPPomh9GBwcgLW5sS&ip={$getIp}&coor=bd09ll");
        $json = json_decode($content);
        $address = $json->{'content'}->{'address'};//按层级关系提取address数据
        $data['address'] = $address;
        $return['province'] = mb_substr($data['address'],0,3,'utf-8');
        $return['city'] = mb_substr($data['address'],3,3,'utf-8');
        return $return;
    }









    }