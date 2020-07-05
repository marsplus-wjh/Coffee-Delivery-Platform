<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller {
    public function index()
    {
    	if($_SESSION['id'] == "")
            $this->display();
        else
        {
            $booking = M('booking');
            $where['uid'] = $_SESSION['id'];
            $arr = $booking->join('goods on goods.id = booking.gid')->where($where)->field("booking.id as id,booking.time as time,goodsname,price,num,candy,cold,name,add,phone,status")->select();
            $this->assign("li",$arr);
            $this->assign("id",$_SESSION['id']);
            $this->assign("name",$_SESSION['name']);
            $this->display();
        }
    }
}