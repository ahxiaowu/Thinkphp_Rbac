<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>角色管理</title>
</head>
<body>
<h3>角色管理</h3> 
<a href="<?php echo U('add');?>">添加角色</a>
<table>
	<tr>
		<th>序号</th>
		<th>角色名称</th>
		<th>操作</th>
	</tr>	
	<?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
		<td><?php echo ($key+1); ?></td>
		<td><?php echo ($vo["role_name"]); ?></td>
		<td>
			<a href="<?php echo U('auth',array('role_id'=>$vo['role_id']));?>">分配权限</a>
		</td>
	</tr><?php endforeach; endif; ?>
</table>
</body>
</html>