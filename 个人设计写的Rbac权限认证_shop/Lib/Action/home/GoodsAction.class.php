<?php

//商品控制器
class GoodsAction extends Action{
    //展示商品列表
    function showlist(){
        //系统有自动加载机制，会完成控制器类的引入
        // ThinkPHP/Lib/Core/Think.class.php
        //$user = new UserAction();
        //echo $user -> number();
        
        //系统给我们提供快捷函数，实现控制器的实例化
        //A('控制器标志')
        //A('[项目://][分组/]控制器');
        //A() ThinkPHP/Common/common.php
        $user = A('home/User');
        echo $user -> number();
        $indx = A("book://Index");
        echo $indx -> apple();
        
        //R("[项目://][分组/]模块/操作方法")  跨模块调用函数
        //实例化控制器并直接调用相关方法
        //R()方法有封装A()方法，之后利用对象调用相关操作
        echo R("home/User/number");
        echo R("book://Index/apple",array('hello','world'));
        
        
        $this -> display();
    }
    //查看商品详细信息
    function detail(){
        $this -> display();
    }
    

}