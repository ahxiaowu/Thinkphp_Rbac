<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>添加角色</title>
        <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
    </head>
    <body>
        <form action="<?php echo U('Rbac/addRoleSave');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2">添加角色</th>
            </tr>
            <tr>
                <td align="right">角色名称:</td>
                <td>
                 <input type="text" name="name" id="">   
                </td>
            </tr>
            <tr>
                <td align="right">角色描述:</td>
                <td>
                    <input type="text" name="remark" id="">
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
                <td align="center" colspan="2">
                    <input type="submit" value="保存添加">
                </td>
            </tr>           
        </table>
        </form>
    </body>
</html>