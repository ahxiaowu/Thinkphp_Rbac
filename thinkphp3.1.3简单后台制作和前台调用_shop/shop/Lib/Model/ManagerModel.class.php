<?php
/**
 * 后台管理员Model
 */
class ManagerModel extends Model{
	//用户名和密码校验
	function checkNamePwd($username,$password){
		//1.检查用户名是否存在
		$info = $this->getByUsername($username);

		//2.用户名如果存在,取出对应的密码信息与用户填写的密码进行比较
		if ($info!=null) {
			//校验密码
			if($info['password']!=$password){
				return false;
			}else{
				return $info;
			}
		}else{
			return false;
		}
	}




}
?>