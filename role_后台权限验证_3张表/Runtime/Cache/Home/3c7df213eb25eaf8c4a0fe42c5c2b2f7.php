<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h3>用户添加</h3>
<form action="" method="post">
	账号:
	<input type="text" name="" id=""> <br />
	账号:
	<input type="text" name="" id=""> <br />
	角色:
	<select name="" id="">
		<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v["role_id"]); ?>"><?php echo ($v["role_name"]); ?></option><?php endforeach; endif; ?>
	</select><br />
	<input type="submit" value=" 添加用户 ">
</form>
</body>
</html>