<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台首页</title>
</head>
<body>
<form method="post" action="<?php echo U('login');?>">
  <fieldset>
    <legend>用户登陆</legend>
    用户名：<input type="text" name="uname" />
    <br />
    密　码：<input type="text" name="pass" />
    <br />
    <input type="submit" value=" 用户登陆 ">
  </fieldset>
</form>
</body>
</html>