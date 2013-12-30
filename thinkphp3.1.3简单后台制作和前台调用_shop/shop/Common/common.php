<?php
/**
 * 当前项目函数库文件
 */

//空操作处理
 function __hack_action(){
	 echo '<img src="/Public/goods/images/404.gif" />';
 }
 
 //空模块处理
 function __hack_module(){
	echo '空模块操作<br /><img src="/Public/goods/images/404.gif" />'; 
 }
 
 function p($arr){
	 dump($arr, true, null, false);
 }