<?php
/*
用户表
create table emailuser(
	uid int primary key auto_increment,
	uname varchar(20) not null default '',
	pass char(32) not null default '',
	email varchar(200) not null default '',
	status tinyint not null default 0
)engine myisam charset utf8;

create table activecode(
	cid int primary key auto_increment,
	uname varchar(20) not null default '',
	code char(16) not null default '',
	expire int not null default 0
)engine myisam charset utf8;
*/

/*
本页面模拟注册用户 + 创建激活码 + 发送激活码
*/

include './conn.php';

$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%';

//8位的随机用户名
$uname = substr(str_shuffle(substr($str,0,52)),0,8);
$email = '877437982@qq.com';

$sql = "insert into emailuser (uname,email) values ('$uname','$email')";
$mysqli->query($sql);

//生成激活码
$code = substr(str_shuffle(substr($str,0,52)),0,8);
$expire = time()+5*24*3600;

$sql = "insert into activecode (uname,code,expire) values ('$uname','$code',$expire)";
$mysqli->query($sql);

echo 'ok';