<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller 
{
    public function index()
	{
		$this->assign("error",isset($_GET['error']) ? $_GET['error'] : 0);
		$this->display();
	}
	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user=M('use');
		$where['username'] = $username;
		$where['password'] = $password;
		$where['kind'] = 0;
		$arr = $user->where($where)->select();
		if($arr)
		{
			$_SESSION['adminusername'] = $username;
			$this->redirect("Index/index");
		}
		else
		{
			$this->redirect('index?error=1');
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
		$this->redirect("index");
	}
}