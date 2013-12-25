<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>配置角色权限</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css">
	<link rel="stylesheet" href="__PUBLIC__/Css/node.css">
	<script src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script>
	$(function(){
		$('input[level="1"').click(function(){
			var inputs = $(this).parents('.app').find('input');
			$(this).attr('checked')?inputs.attr('checked','checked'):inputs.removeAttr('checked');
		});
		$('input[level="2"').click(function(){
			var inputs = $(this).parents('dl').find('input');
			$(this).attr('checked')?inputs.attr('checked','checked'):inputs.removeAttr('checked');
		});		
	});
	</script>
</head>
<body>
	<div id="wrap">
		<a href="<?php echo U('Rbac/role');?>" class="add-app">返回上级</a>
		<form action="<?php echo U('Rbac/setAccess');?>" method="post">
		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
				<p>
					<strong>
						<?php echo ($app["title"]); ?>(<?php echo ($app["name"]); ?>) 
					</strong>
					<input level="1" type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" <?php if($app['access']): ?>checked="checked"<?php endif; ?>>
				</p>
				
				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt>
							<strong><?php echo ($action["title"]); ?>(<?php echo ($action["name"]); ?>) </strong>
							<input level="2" type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" <?php if($action['access']): ?>checked="checked"<?php endif; ?>>
						</dt>

						<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
								<span><?php echo ($method["title"]); ?>(<?php echo ($method["name"]); ?>) </span>
								<input level="3" type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" <?php if($method['access']): ?>checked="checked"<?php endif; ?>>
							</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
			</div><?php endforeach; endif; ?>
		<input type="hidden" name="rid" value="<?php echo ($rid); ?>">
		<input type="submit" value="保存修改">
		</form>
	</div>
</body>
</html>