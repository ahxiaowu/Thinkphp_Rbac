<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h3>添加权限</h3>
<form action="/role/Home/Auth/add" method="post">
	权限名称:
	<input type="text" name="auth_name" id=""><br/>
	父级权限:
	<select name="auth_pid" id="">
		<option value="0">请选择</option>
		<?php if(is_array($authInfo)): foreach($authInfo as $key=>$v): ?><option value="<?php echo ($key); ?>"><?php echo ($v); ?></option><?php endforeach; endif; ?>
	</select><br/>
	权限模块:
	<input type="text" name="auth_c" id=""><br/>
	权限方法:
	<input type="text" name="auth_a" id=""><br/>	
	<input type="submit" value=" 添加权限 ">	
</form>
</body>
</html>