<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>后台首页</title>
        <meta charset="UTF-8">
        <base target="iframe"/>
        <style>
        body{
        	font-size: 14px;
            margin: 0px;
            padding: 0px;
        }
        #top{
            width: 99%;
            height: 60px;
            margin: 0px auto;
            text-align: center;
        }
        #top .exit{
            margin-top: 10px;
        }
		#left{
			width: 200px;
			border: 1px solid #d9d9d9;
			float: left;
		}
		#right{
			float: left;
			width: 600px;
			margin-left: 10px;
		}
		#bottom{
			clear: both;
            text-align: center;
		}
        </style>
    </head>
    <body>
        <div id="top">
            <div class="exit">
                <a href="#" target="_self">退出系统</a>
            </div>
        </div>
        <div id="left">
        	<?php if(is_array($prow)): foreach($prow as $key=>$vo): ?><dl>
            	<dt><?php echo ($vo["auth_name"]); ?></dt>
            	<?php if(is_array($srow)): foreach($srow as $key=>$svo): if($vo['auth_id'] == $svo['auth_pid'] ): ?><dd>
            			<a href="<?php echo U($svo['auth_c'].'/'.$svo['auth_a']);?>"><?php echo ($svo["auth_name"]); ?></a>
            		</dd><?php endif; endforeach; endif; ?>
            </dl><?php endforeach; endif; ?>
        </div>
        <div id="right">
            <iframe name="iframe" src="<?php echo U('welcome');?>" height="500" width="800"></iframe>
        </div>
        <div id="bottom">版权所有©2006-2014</div>
    </body>
</html>