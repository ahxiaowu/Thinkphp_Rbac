<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h3>用户列表</h3>
<a href="<?php echo U('add');?>">添加用户</a>
<table>
	<tr>
		<th>ID</th>
		<th>账号</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["uname"]); ?></td>
		<td><?php echo ($v["utime"]); ?></td>
		<td>
			<a href="">修改</a> | 
			<a href="">删除</a>
		</td>
	</tr><?php endforeach; endif; ?>
</table>
</body>
</html>