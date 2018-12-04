<?php 
namespace app\api\model;

use think\Model;
use think\Db;

class Weather extends Model
{
    public function getWeather($cityCode ='100100001')
    {
      $url='http://t.weather.sojson.com/api/weather/city/'.$cityCode;
       // $res = Db::name('news')->where('id', $id)->select();
       return $this->https_request($url);
    }
     function https_request ($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($ch);
        curl_close($ch);
        return  json_decode($out,true);
    }

   
}