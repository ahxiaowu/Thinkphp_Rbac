<?php
/*
接收邮件类
*/
class Pop3{
	const BR = "\r\n";
	private $host = 'pop3.163.com';
	private $port = '110';

	private $user = 'ahxiaowj'; //邮箱用户名
	private $pass = '';  //邮箱密码

	private $erron  = -1;
	private $errstr = '';

	private $dh = null;

	// 连接服务器
	public function conn(){
		$this->dh = fsockopen($this->host,$this->port,$this->erron,$this->errstr,3);
	}

	//发送用户名和密码 登陆
	public function login(){
		fwrite($this->dh, 'user '.$this->user.self::BR);
		if(strtolower(substr($this->getLine(),0,3))!='+ok'){
			throw new Exception('用户名不正确');
		}
		fwrite($this->dh, 'pass '.$this->pass.self::BR);
		if(strtolower(substr($this->getLine(),0,3))!='+ok'){
			throw new Exception('密码不正确');
		}
	}

	//查询一共有多少邮件
	public function getCnt(){
		fwrite($this->dh, 'stat'.self::BR);
		$tmp = explode(' ',$this->getLine());
		return $tmp[1];
	}

	//查询出的邮件发信人
	public function getAll(){
		fwrite($this->dh, 'top 2 1'.self::BR);
		while (!preg_match('/^from:/iUs',($row = fgets($this->dh)))) {}
		$preg = "/(?<=\<).*(?=\>)/is";
		preg_match($preg, $row,$arr);
		return $arr[0];   
	}

	//读取一行
	private function getLine(){
		return fgets($this->dh);
	}
}//End Class


$pop = new Pop3();
try {
	$pop->conn();
	$pop->login();	
	echo '你有 '.$pop->getCnt().' 封邮件<hr />';
	echo $pop->getAll();
} catch (Exception $e) {
	echo $e->getMessage();
}
?>