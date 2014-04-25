<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h3>权限管理</h3>
<a href="<?php echo U('add');?>">添加权限</a>
<table border="1" width="800">
	<tr>
		<th>ID</th>
		<th>权限名称</th>
		<th>父级ID</th>
		<th>模块</th>
		<th>方法</th>
		<th>全路径</th>
		<th>级别</th>
	</tr>

	<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
		<td align="center"><?php echo ($v["auth_id"]); ?></td>
		<td><?php echo ($v["auth_name"]); ?></td>
		<td align="center"><?php echo ($v["auth_pid"]); ?></td>
		<td align="center"><?php echo ($v["auth_c"]); ?></td>
		<td align="center"><?php echo ($v["auth_a"]); ?></td>
		<td align="center"><?php echo ($v["auth_path"]); ?></td>
		<td align="center"><?php echo ($v["auth_level"]); ?></td>
	</tr><?php endforeach; endif; ?>
</table>
</body>
</html>