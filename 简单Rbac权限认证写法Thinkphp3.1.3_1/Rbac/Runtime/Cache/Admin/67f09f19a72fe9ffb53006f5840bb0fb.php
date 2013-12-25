<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加节点</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
        <form action="<?php echo U('Rbac/addNodeSave');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">添加节点</th>
            </tr>
            <tr>
                <td align="right"><?php echo ($type); ?>名称:</td>
                <td>
                 <input type="text" name="name" id="">   
                </td>
            </tr>
            <tr>
                <td align="right"><?php echo ($type); ?>描述:</td>
                <td>
                    <input type="text" name="title" id="">
                </td>
            </tr>
            <tr>
                <td align="right">是否开启:</td>
                <td>
                    <input type="radio" checked name="status" id="" value="1">开启 
                    <input type="radio" name="status" id="" value="0">关闭 
                </td>
            </tr>
            <tr>
                <td align="right">排序:</td>
                <td>
                    <input type="text" name="sort" id="" value="1">
                </td>
            </tr>            
            <tr>
                <td align="center" colspan="2">
                	<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
                	<input type="hidden" name="level" value="<?php echo ($level); ?>">
                    <input type="submit" value="保存添加">
                </td>
            </tr>           
        </table>
        </form>	
</body>
</html>