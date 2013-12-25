<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>博文列表</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/blog.css" />
</head>
<body>
<table class="table">
    <tr>
        <th>ID</th>
        <th>标题</th>
    </tr>

    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
        <td><?php echo ($v["id"]); ?></td>
        <td><?php echo ($v["title"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
</body>
</html>