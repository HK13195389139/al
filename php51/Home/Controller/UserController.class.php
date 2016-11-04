<?php 
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function index(){
		echo '520 hk';
	}
	public function register(){
		if (IS_POST) {
		$username = I('post.username')
	;	$password = I('post.password');
		$mail = I('post.mail');
		$salt = md5(time());
		$data = array(
			'username' =>$username,
			'password' =>$password,
			'email' => $mail,
			'salt' => $salt,
			);
		$rs = M('user')->add($data);
		if ($rs) {
			$sendRs = sendMail("用户激活邮件","尊敬的$username,感谢您注册我们的网站应用，<a href='http://www.al.com/index.php/Home/User/active/id/$rs/salt/$salt'>请点击进行您的用户状态的激活操作</a>",$mail);
			if ($sendRs === True) {
				$this->success('注册成功,去邮箱激活账号吧',U('User/index'),3);
					}	
				}else{
			$this->error('注册失败',U('User/register'),3);
				}
			}else{
				$this->display();
		}	
	}
	public function active(){
		$id = I('get.id');
		$salt = I('get.salt');
		$saltRs = M('user')->where("salt = '$salt'")->find();
		if ($saltRs === NULL){
			$this->error('非法激活，我要报警！',U('User/index'),3);
		}else{
			 $rs = M('user')->where("id = $id AND salt = '$salt'")->setField('active',1);
			if($rs){
        $this->success('用户激活成功,请登录！O(∩_∩)O哈哈~',U('User/index'),3);
      }else{
        $this->error('激活失败,请联系管理员！',U('User/index'),3);
      }
		}
	}
}
/* if(IS_POST){
      //收集表单传输的数据
      $username = I('post.username');
      $password = I('post.password');
      $mail = I('post.mail');
      $salt = md5(time());
      //插入数据库的数组组合
      $data = array(
        'username' => $username,
        'password' => $password,
        'email' => $mail,
        'salt' => $salt
        );
      //插入操作
      //插入成功返回值为主键的值(用户id)
      $rs = M('user')->add($data);
      //判断是否注册成功
      //输出对应的提示信息
      if($rs){
        //注册成功之后，发送邮件给用户填写的邮箱地址
        $sendRs = sendMail("用户激活邮件","尊敬的$username,感谢您注册我们的网站应用，<a href='http://www.api51.com/index.php/Home/User/active/id/$rs/salt/$salt'>请点击进行您的用户状态的激活操作</a>",$mail);
        //判断是否发送邮件成功
        if($sendRs === true){
          //发送邮件成功
          $this->success('注册成功,请到邮箱激活用户',U('User/index'),3);
        }
      }else{
        $this->error('注册失败',U('User/register'),3);
      }
      // dump($rs);die;
      //提交表单，进行注册
    }else{
      //加载注册页面
      $this->display();
    }
  }
  //激活用户方法
  public function active(){
    //1.接收用户id信息
    $id = I('get.id');
    $salt = I('get.salt');
    //知道要激活哪个用户操作
    //单独查询salt盐值
    $saltRs = M('user')->where("salt = '$salt'")->find();
    // dump($saltRs);die;
    if($saltRs === NULL){
      $this->error('非法激活，我要报警！',U('User/index'),3);
    }else{
      //2.修改用户字段active信息
      $rs = M('user')->where("id = $id AND salt = '$salt'")->setField('active',1);
      //3.如果修改成功，就说明用户激活了
      if($rs){
        $this->success('用户激活成功,请登录！O(∩_∩)O哈哈~',U('User/index'),3);
      }else{
        $this->error('激活失败,请联系管理员！',U('User/index'),3);
      }
    }
  }
}*/