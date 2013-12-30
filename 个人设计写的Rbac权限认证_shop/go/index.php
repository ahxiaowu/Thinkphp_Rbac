<?php
header("content-type:text/html;charset=utf-8");
//创建项目的应用目录
//许多文件目录会创建在这个地方
define("APP_PATH","../");

//设置开发模式为"调试模式"
define("APP_DEBUG",true);

//制作一个调试输出函数
function show_bug($msg,$color='red'){
    echo "<pre style='color:".$color."'>";
    var_dump($msg);
    echo "</pre>";
}

//把css和img图片路径定义为常量，以便使用
define("SITE_URL","http://web.1016.com/");
define("CSS_URL",SITE_URL."shop/go/public/home/css/"); //前台css样式路径常量
define("IMG_URL",SITE_URL."shop/go/public/home/img/"); //前台图片路径常量
define("JS_URL",SITE_URL."shop/go/public/home/js/"); //前台图片路径常量
//后台css和图片路径
define("ADMIN_CSS_URL",SITE_URL."shop/go/public/admin/css/");
define("ADMIN_IMG_URL",SITE_URL."shop/go/public/admin/img/");


include "../../ThinkPHP/ThinkPHP.php";
