<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>添加博文</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/blog.css" />
        <script type="text/javascript" src="__ROOT__/Public/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="__ROOT__/Public/ueditor/ueditor.all.min.js"></script>
        <script>
            window.UEDITOR_HOME_URL = '__ROOT__/Public/ueditor/';
            window.onload = function(){
                window.UEDITOR_CONFIG.initialFrameHeight = 500;
                UE.getEditor('info');
            }
        </script>         
    </head>
    <body>
        <form action="<?php echo U(GROUP_NAME.'/Blog/saveblog');?>" method="post">
        <table class="table">
            <tr>
                <td class="right">标题：</td>
                <td>
                    <input type="text" name="title" />
                </td>
            </tr>
            <tr>
                <td class="right">点击次数：</td>
                <td>
                    <input type="text" name="click" value="1" />
                </td>
            </tr>
            <tr>
                <td class="right">类别：</td>
                <td>
                    <select name="cid">
                        <option value="0"> ==请选择类别== </option>
                        <?php if(is_array($cateArr)): foreach($cateArr as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); ?> <?php echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </td>
            </tr>       
            <tr>
                <td class="right">属性：</td>
                <td>
                    <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><span style="color:<?php echo ($v["color"]); ?>;font-weight:bold;">
                            <input type="checkbox" value="<?php echo ($v["id"]); ?>" name="aid[]" /> <?php echo ($v["aname"]); ?>
                        </span><?php endforeach; endif; ?>
                </td>
            </tr>    
            <tr>
                <td colspan="2">
                    <textarea id="info" name="content"></textarea>
                </td>
            </tr>  
             <tr>
                <td colspan="2">
                    <input type="submit" value=" 提交博文 " />
                </td>
            </tr>             
        </table>
    </form>
    </body>
</html>