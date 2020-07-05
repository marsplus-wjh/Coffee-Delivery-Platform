<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index()
    {

        $this->display();
    }
    public function register()
    {
    	if($_POST['username'] == "" || $_POST['password'] == "" || $_POST['name'] == "" || $_POST['phone'] == "")
    	{
    		echo "栏位不能为空";
    		return;
    	}
    	$where['username'] = $_POST['username'];
    	$user = M('use');
    	$ok = $user->where($where)->select();
    	if($ok)
    	{
    		echo "用户已存在";
    		return;
    	}
		$where['password'] = $_POST['password'];
    	$where['name'] = $_POST['name'];
    	$where['phone'] = $_POST['phone'];
    	$ok = $user->add($where);
    	if($ok)
    	{
    		$arr = $user->where($where)->select();
    		$_SESSION['id'] = $arr[0]['id'];
    		$_SESSION['username'] = $arr[0]['username'];
    		$_SESSION['name'] = $arr[0]['name'];
    		echo "OK";
    	}
    	else echo "Wrong";
    }
	
	
	
	
	
	
    public function login()
    {
    	$username = $_POST['username'];
		$password = $_POST['password'];
		$user=M('use');
		$where['username'] = $username;
		$where['password'] = $password;
		$arr = $user->where($where)->select();
		if($arr)
		{
			$_SESSION['id'] = $arr[0]['id'];
			$_SESSION['username'] = $arr[0]['username'];
			$_SESSION['name'] = $arr[0]['name'];
			echo "OK";
		}
		else
		{
			echo "帐号密码不正确";
		}
    }
	
	
	
	
	
	
	
	
    public function logout()
    {
    	$_SESSION=array();
		if(isset($_COOKIE[session_name()]))
		{
			setcookie(session_name(),'',time()-1,'/');
		}
		session_destroy();
		$this->redirect("Index/index");
    }
}