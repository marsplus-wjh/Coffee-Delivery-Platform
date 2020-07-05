<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AuthorController 
{
    public function index()
    {
    	$user=M('use');
    	$where['kind'] = 1;
    	$count = $user->where($where)->count();
    	$Page = new \Think\Page($count,6);
    	$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
    	$show = $Page->show();
    	$list = $user->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('li',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public function show_user()
    {
    	$where['id'] = $_GET['id'];
    	$where['kind'] = 1;
    	$user=M('use');
    	$arr = $user->where($where)->select();
    	$this->assign('li',$arr);
        $this->display();
    }
    public function modify_user()
    {
    	$user=M('use');
    	if(isset($_POST['id']))
    		$where['id'] = $_POST['id'];
    	if(isset($_POST['name']))
    		$where['name'] = $_POST['name'];
    	if(isset($_POST['password']))
    		$where['password'] = $_POST['password'];
    	if(isset($_POST['phone']))
    		$where['phone'] = $_POST['phone'];
    	if(isset($_POST['username']))
    		$where['username'] = $_POST['username'];
    	var_dump($where);
    	$ok = $user->save($where);
    	if(!isset($_POST['username']))
    		$this->redirect("show_user?id=".$_POST['id']);
    	else
    		$this->redirect("admin?id=".$_POST['id']);
    }
    public function dele_user()
    {
    	$where['id'] = $_POST['id'];
    	$user = M('use');
    	$ok |= $user->where($where)->delete();
    	$booking = M('booking');
    	$where1['uid'] = $_POST['id'];
    	$ok |= $booking->where($where1)->delete();
    	if($ok) echo "OK";
    	else echo "Wrong"; 
    }
    public function booking()
    {
    	$booking = M("booking");
    	$where['status'] = 0;
    	$count = $booking->where($where)->count();
    	$Page = new \Think\Page($count,8);
    	$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
    	$show = $Page->show();
    	$list = $booking->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('li',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
    public function old_booking()
    {
    	$booking = M("booking");
    	$count = $booking->where("status = 1 or status = 2")->count();
    	$Page = new \Think\Page($count,8);
    	$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
    	$show = $Page->show();
    	$list = $booking->where("status = 1 or status = 2")->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('li',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
    public function new_booking()
    {
    	$booking=M('booking');
    	$where['status'] = 0;
    	$arr = $booking->where($where)->count();
        if(!isset($_SESSION['adminusername']) || $_SESSION['adminusername'] == '')
            $flag = false;
        else 
            $flag = true;
        $ans['num'] = $arr;
        $ans['flag'] = $flag;
    	echo json_encode($ans);
    }
    public function show_booking()
    {
    	$booking = M("booking");
    	$where['booking.id'] = $_GET['id'];
    	$arr = $booking->where($where)->join("goods on goods.id = booking.gid")->field("booking.id,name,add,phone,candy,cold,goodsname,status,num")->select();
    	$this->assign("li",$arr);
    	$this->display();
    }
    public function check_booking()
    {
    	$booking = M('booking');
    	$where['id'] = $_GET['id'];
    	if($_GET['op'] == "correct")
    		$where['status'] = 1;
    	else if($_GET['op'] == "reject")
    		$where['status'] = 2;
    	$ok = $booking->save($where);
		if($ok)
    		echo "OK";
    	else
    		echo "Wrong";
    }
    public function admin()
    {
    	$where['kind'] = 0;
    	$user=M('use');
    	$arr = $user->where($where)->select();
    	$this->assign('li',$arr);
        $this->display();
    }
    public function goods()
    {
    	$goods = M('goods');
    	$count = $goods->count();
    	$Page = new \Think\Page($count,6);
    	$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
    	$show = $Page->show();
    	$list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('li',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
    public function show_goods()
    {
    	if(isset($_GET['id']))
    	{	
    		$goods = M('goods');
    		$where['id'] = $_GET['id'];
	    	$arr = $goods->where($where)->select();
	    	$this->assign("li",$arr);
    	}
    	$this->display();
    }
    public function add_goods()
    {
    	$upload = new \Think\Upload();// 实例化上传类    
    	$upload->maxSize = 3145728 ;// 设置附件上传大小  
    	$upload->autoSub = false;  
    	$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    	$upload->rootPath = './Public/img/';    
    	$info = $upload->upload();
    	if($info['photo']['savename'] != "")
    		$where['pic'] = $info['photo']['savename'];
    	if(isset($_POST['id']) && $_POST['id'] != "")
    		$where['id'] = $_POST['id'];
    	if(isset($_POST['goodsname']))
    		$where['goodsname'] = $_POST['goodsname'];
    	if(isset($_POST['price']))
    		$where['price'] = $_POST['price'];
    	if(isset($_POST['describe']))
    		$where['describe'] = $_POST['describe'];
        $where['time'] = date("Y-m-d H:i:s", time());
    	$goods = M('goods');
    	if(isset($_POST['id']) && $_POST['id'] != "")
    		$ok = $goods->save($where);
    	else
    		$ok = $goods->add($where);
    	$this->redirect("goods");
    }
    public function dele_goods()
    {
    	$where['id'] = $_POST['id'];
    	$goods = M('goods');
    	$ok |= $goods->where($where)->delete();
    	$where1['gid'] = $_POST['id'];
    	if($ok) echo "OK";
    	else echo "Wrong";
    }
}	
