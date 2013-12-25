<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加用户</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css">
	<style>
	.add-role{
		display:inline-block;
		width: 100px;
		height: 25px;
		line-height: 25px;
		text-align: center;
		border: 1px solid blue;
		border-radius: 4px;
		margin-left: 20px;
		cursor: pointer;
	}
	</style>
	<script src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script>
	$(function(){
		$('.add-role').click(function(){
			var obj = $(this).parents('tr').clone();
			obj.find('.add-role').remove();
			$('#last').before(obj);
		});
	});
	</script>
</head>
<body>
	<form action="<?php echo U('Rbac/addUserSave');?>" method="post">
	<table class="table">
		<tr>
			<th colspan="2">添加用户</th>
		</tr>
		<tr>
			<td align="right">用户账号:</td>
			<td>
				<input type="text" name="username" id="">
			</td>
		</tr>
		<tr>
			<td align="right">密码:</td>
			<td>
				<input type="password" name="password" id="">
			</td>
		</tr>
		<tr>
			<td align="right">所属角色</td>
			<td>
				<select name="roid_id[]">
					<option value="">请选择角色</option>
					<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["remark"]); ?>[<?php echo ($v["name"]); ?>]</option><?php endforeach; endif; ?>
				</select>
				<span class="add-role">添加一个角色</span>
			</td>
		</tr>
		<tr id="last">
			<td colspan="2" align="center">
				<input type="submit" value="保存添加">
			</td>
		</tr>
	</table>
	</form>
</body>
</html>