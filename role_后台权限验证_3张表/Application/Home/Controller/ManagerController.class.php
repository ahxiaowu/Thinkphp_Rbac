<?php
/**
 * 管理员列表
 */
namespace Home\Controller;
use Home\Controller\CommonController;
class ManagerController extends CommonController{
	function index(){
		$this->info = M('user')->select();
		$this->display();
	}

	function add(){
		$this->role = M('role')->select();
		$this->display();
	}
}
?>