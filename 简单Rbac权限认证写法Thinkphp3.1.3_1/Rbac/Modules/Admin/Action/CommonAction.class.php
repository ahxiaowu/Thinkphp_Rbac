<?php 
class CommonAction extends Action{

	function _initialize(){
		if(!isset($_SESSION[C('USER_AUTH_KEY')])){
			$this->redirect('Admin/Login/index');
		}
		
		//不需要验证方法或控制器
		$notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

		if(C('USER_AUTH_ON') && !$notAuth){
			import('ORG.Util.RBAC');
			RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');
		}
	}



}
?>