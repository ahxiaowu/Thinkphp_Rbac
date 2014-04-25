<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    // 登陆界面
    function index(){
  		$this->display();   
    }

    // 用户登陆
    function login(){
    	$uname = I('uname');
    	$pass  = I('pass');
    	$db = M('user');
    	$row = $db->where(array('uname'=>$uname))->find();
    	if($row){
    		if($row['pass'] == $pass){
    			session('uid',$row['id']);
    			session('role_id',$row['role_id']);
                session('uname',$row['uname']);
    			$this->redirect('Welcome/index');
    		}
    	}
    }












}
?>