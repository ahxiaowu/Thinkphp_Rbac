<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	body{
		font-size: 14px;
	}
	ul,li{
		list-style: none;
	}
	</style>
</head>
<body>
<h3>分配权限 -- <?php echo ($roleName); ?></h3>
<form action="/role/Home/Role/auth" method="post">
<?php if(is_array($pauth)): foreach($pauth as $key=>$v): ?><ul>
	<li>
		<?php echo ($v["auth_name"]); ?>
		<?php if(in_array($v['auth_id'],explode(',',$roleids))): ?><input type="checkbox" name="authID[]" value="<?php echo ($v["auth_id"]); ?>" checked="checked">
		<?php else: ?>
			<input type="checkbox" name="authID[]" value="<?php echo ($v["auth_id"]); ?>"><?php endif; ?>
	</li>
	<li>
		<ul>
			<?php if(is_array($sauth)): foreach($sauth as $key=>$vo): if($vo['auth_pid'] == $v['auth_id']): ?><li>
				<?php echo ($vo["auth_name"]); ?>
				<?php if(in_array($vo['auth_id'],explode(',',$roleids))): ?><input type="checkbox" name="authID[]" value="<?php echo ($vo["auth_id"]); ?>" checked="checked">
				<?php else: ?>
					<input type="checkbox" name="authID[]" value="<?php echo ($vo["auth_id"]); ?>"><?php endif; ?>
			</li>
			<li>
				<ul>
					<?php if(is_array($tauth)): foreach($tauth as $key=>$vv): if($vo['auth_id'] == $vv['auth_pid']): ?><li>
						<?php echo ($vv["auth_name"]); ?>
						<?php if(in_array($vv['auth_id'],explode(',',$roleids))): ?><input type="checkbox" name="authID[]" value="<?php echo ($vv["auth_id"]); ?>" checked="checked">
						<?php else: ?>
							<input type="checkbox" name="authID[]" value="<?php echo ($vv["auth_id"]); ?>"><?php endif; ?>
					</li><?php endif; endforeach; endif; ?>
				</ul>
			</li><?php endif; endforeach; endif; ?>
		</ul>
	</li>
</ul><?php endforeach; endif; ?>
<input type="hidden" name="role_id" value="<?php echo ($role_id); ?>">
<input type="submit" value=" 分配权限 ">
</form>
</body>
</html>