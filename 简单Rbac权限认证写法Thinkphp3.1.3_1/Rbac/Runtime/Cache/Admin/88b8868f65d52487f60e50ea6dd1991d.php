<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>后台登陆页面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
    <script>
        var URL = '<?php echo U(GROUP_NAME."/Login/verify");?>';
    </script>
    <script src="__PUBLIC__/Js/login.js"></script>
</head>
<body>
<div id="login_main">
    <form method="post" action="<?php echo U(GROUP_NAME.'/Login/login');?>">
        用户名:<input type="text" name="username" /><br />
        密　码:<input type="text" name="password" /><br />
        验证码:<input type="text" name="codes" />
        <img src="<?php echo U(GROUP_NAME.'/Login/verify');?>" id="code" />
        <a href="javascript:void(0)" onclick="change_code('code')">看不清</a>
        <br />
        <input type="submit" name="btn" value="　登陆 " />
    </form>
</div>
</body>
</html>