<?php
namespace Admin\Controller;
use Think\Controller;
class AuthorController extends Controller
{
	public function _initialize()
	{
		if(!isset($_SESSION['adminusername']) || $_SESSION['adminusername'] == '')
		{
			$this->redirect('Login/index');
		}
	}
}
?>