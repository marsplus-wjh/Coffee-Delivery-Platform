<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
    	if($_SESSION['id'] == "")
    		$this->assign("flag",0);
    	else
    	{
    		$this->assign("flag",1);
    		$this->assign("id",$_SESSION['id']);
    		$this->assign("name",$_SESSION['name']);
    	}
    	$goods = M('goods');
    	$arr = $goods->select();
    	$this->assign("li",$arr);
        $this->display();
    }


    
    public function goods()
    {
    	if($_SESSION['id'] == "")
            $this->assign("flag",0);
        else
        {
            $this->assign("flag",1);
            $this->assign("id",$_SESSION['id']);
            $this->assign("name",$_SESSION['name']);
        }
        $goods = M('goods');
        $where['id'] = $_GET['id'];
        $arr = $goods->where($where)->select();
        $this->assign('gid',$_GET['id']);
        $this->assign('uid',$_SESSION['id']);
        $this->assign('li',$arr[0]);
        $this->display();
    }





    public function booking()
    {
        $goods = M('goods');
        $where['id'] = $_POST['gid'];
        $arr = $goods->where($where)->select();
        $data['uid'] = $_POST['uid'];
        $data['gid'] = $_POST['gid'];
        $data['name'] = $_POST['name'];
        $data['add'] = $_POST['add'];
        $data['phone'] = $_POST['phone'];
        $data['candy'] = $_POST['candy'];
        $data['cold'] = $_POST['cold'];
        $data['num'] = $_POST['num'];
        $data['time'] = date("Y-m-d H:i:s", time());
        $booking = M('booking');
        $ok = $booking->add($data);
        if($ok)
            echo "OK";
        else echo "Wrong";
    }
    
    public function search()
    {
        $goods = M('goods');
        if($_POST['text'] == "")
            $arr = $goods->select();
        else
        {
            $where['goodsname'] = array('like',"%".$_POST['text']."%"); 
            $where['describe'] = array('like',"%".$_POST['text']."%");
            $where['_logic'] = "OR"; 
            $arr = $goods->where($where)->select();
        }
        echo json_encode($arr);
    }
    public function sort()
    {
        $goods = M('goods');
        $where['price'] = array(array('gt',$_POST['left']),array('lt',$_POST['right'])) ;
        if($_POST['text'] == "")
            $arr = $goods->where($where)->order($_POST['sort'])->select();
        else
        {
            $whe['goodsname'] = array('like',"%".$_POST['text']."%"); 
            $whe['describe'] = array('like',"%".$_POST['text']."%");
            $whe['_logic'] = "OR";
            $where['_complex'] = $whe; 
            $arr = $goods->where($where)->order($_POST['sort'])->select();
        }
        echo json_encode($arr);
    }
}