<?php

namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		echo "HK520";
		$this->display();
	}
	public function cleateJson(){
		$a = array(
			'name'=>'hk',
			'age'=>'20',
			'love'=>'null',
			);
		$b = json_encode($a);
		dump($b);
	}
	public function readJson(){
		$c = '{"name":"hk","age":"20","love":"null"}';
		$d = json_decode($c);
		dump($d);
		echo "<br />";
		$e = json_decode($c,true);
		dump($e);
	}
	public function cleateXml(){
		$str = '<?xml version="1.0" encoding="utf-8"?>';
		$str .='<person>';
		$str .='<name>hk</name>';
		$str .='<age>20</age>';
		$str .='<love>null</love>';
		$str .='</person>';
		$rs = file_put_contents('./Test/data1.xml', $str);
		echo $rs;
	}
	public function readXml(){
		$h = file_get_contents('./Test/data1.xml');
		$obj = simplexml_load_string($h);
		echo 'name:'.$obj->name;
	}
	public function test(){
		$url = 'https://www.baidu.com';
		$content = request($url);
		echo 'hk 520';
		echo $content;
	}
	public function daytq(){
		$city = I('get.city');
		
		$url= 'http://api.map.baidu.com/telematics/v2/weather?location='.$city.'&ak=B8aced94da0b345579f481a1294c9094';

		//echo $url;die();
		$content = request($url,false);
		$xmlObj = simplexml_load_string($content);
		
		//dump($xmlObj);
		$dayInfo = $xmlObj->results->result[0];
		echo '城市：'.$city.'<br />';
		
		echo '实时温度:'.$dayInfo->date.'<br />';	
	}
	public function phone(){
      //接收get方式传过来的phone
      $phone = I('get.phone');
      //1.url地址
      $url = 'http://cx.shouji.360.cn/phonearea.php?number='.$phone;
      //2.判断请求方式
      //3.发送请求
      $content = request($url,false);
      //4.处理数据返回值
      //返回数据为json格式
      $content = json_decode($content);     //解析为对象
      echo '当前号码:'.$phone.'<br />';
      echo '省份:'.$content->data->province.'<br />';
      echo '城市:'.$content->data->city.'<br />';
      echo '运行商:'.$content->data->sp.'<br />';
    }
   	public function express(){
   		$type = 'yuantong';
   		$postid ='809093148704';
   		$url = 'https://www.kuaidi100.com/query?type='.$type.'&postid='.$postid;
   		$content = request($url);
   		dump($content);die();
   		$content = json_decode($content);
   		$data = $content->data;

   		foreach ($data as $key => $value) {
   			echo $value->time.'###'.$value->content.'<br />';
   		}
   	}
   	public function sendTest(){
      //调用function.php里的sendMail
      // $rs = sendMail('我是php发送的邮件','你好，我是php，你是谁呢？','woai281@163.com');
      $rs = sendMail('我是php发送的邮件','你好，我是php，你是谁呢？','m13195644682@163.com');
      //接收返回值并进行判断
      if($rs === true){
        echo '发送邮件成功！';
      }else{
        echo '发送失败,错误原因为:'.$rs;
      }
    }
    public function testStr(){
    	$phone = '13195644628';
    	$areaNum = substr($phone,0,5);
    	dump($areaNum);
    	echo "<hr>";
    	$str = '爱我,你怕了吗';
    	$a = mb_substr($str,0,5);
    	$a = mb_substr($str,0,5,'utf-8');
    	dump($a);
    }
}