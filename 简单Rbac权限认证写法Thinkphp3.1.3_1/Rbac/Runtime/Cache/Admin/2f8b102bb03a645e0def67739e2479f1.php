<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>节点列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css">
	<link rel="stylesheet" href="__PUBLIC__/Css/node.css">
</head>
<body>
	<div id="wrap">
		<a href="<?php echo U('Rbac/addNode');?>" class="add-app">添加应用</a>
		
		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
				<p>
					<strong>
						<?php echo ($app["title"]); ?>(<?php echo ($app["name"]); ?>) 
						[<a href="<?php echo U('Rbac/addNode',array('pid'=>$app['id'],'level'=>2));?>">添加控制器</a>]
					</strong>
				</p>
				
				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt>
							<strong><?php echo ($action["title"]); ?>(<?php echo ($action["name"]); ?>) </strong>
							[<a href="<?php echo U('Rbac/addNode',array('pid'=>$action['id'],'level'=>3));?>">添加方法</a>] 
							[<a href="">修改</a>] [<a href="">删除</a>]
						</dt>

						<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
								<span><?php echo ($method["title"]); ?>(<?php echo ($method["name"]); ?>) </span>
								[<a href="">修改</a>] [<a href="">删除</a>]
							</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
			</div><?php endforeach; endif; ?>

	</div>
</body>
</html>