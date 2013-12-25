<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
<table class="table">
	<tr>
		<th>ID</th>
		<th>用户名称</th>
		<th>上一次登陆时间</th>
		<th>上一次登陆IP</th>
		<th>锁定状态</th>
		<th>用户所属组别</th>
		<th>操作</th>
	</tr>
	
	<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["username"]); ?></td>
			<td><?php echo (date("Y-m-d H:i",$v["logintime"])); ?></td>
			<td><?php echo ($v["loginip"]); ?></td>
			<td>
				<?php if($v['lock']): ?>锁定<?php endif; ?>
			</td>
			<td>
				<ul>
					<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$val): ?><li><?php echo ($val["remark"]); ?>[<?php echo ($val["name"]); ?>]</li><?php endforeach; endif; ?>
				</ul>
			</td>
			<td>
				<a href="">锁定</a>
			</td>
		</tr><?php endforeach; endif; ?>
</table>
</body>
</html>