<?php

// 用户控制器
// Action是普通控制器父类
// ThinkPHP/Lib/Core/Action.class.php
class UserAction extends Action{
    //登录操作
    function login(){
        echo R("book://Index/apple",array(10,20));
        echo R("book://Index/apple2");
        //创建路由 U()  函数
        //echo U('User/register')."<br />";
        
        //调用模板
        //display()没有参数，默认模板名称与当前操作名称一致
        $this -> display();
    }
    
    //注册操作
    function register(){
        $user_model = D("User");
        if(!empty($_POST)){
            show_bug($_POST);
            $z = $user_model -> create();  //收集数据
            if($z){
                //把爱好的数组变为字符串
                $user_model -> user_hobby = implode(',',$_POST['user_hobby']);
                //$user_model -> password = md5($_POST['password']);
                //$user_model -> user_time = time();
                
                $rst = $user_model -> add();
                if($rst){
                    echo "ok";
                } else {
                    echo "failure";
                }
            } else {
                //表单域验证有错误
                show_bug($user_model -> getError());
            }

        }else {
        }
        $this -> display();
        
    }
    
    //要把以下魔术方法放到父类里边
    //这样相同的代码只维护一份即可
    //function __call($method,$arg){
    //    echo "您调用的操作方法不存在";
    //}
    
    //定义空操作的接收方法
    function _empty($m,$a){
        echo "<img src='".IMG_URL."404.gif' alt='' />";
    }
    
    function number(){
        //查询数据库
        //系统里边有许多地方都需要显示用户数目
        return "当前系统注册用户有1231人";
    }
    
    function checkname(){
//        $_GET['name']
                //model模型去数据库查询$_GET['name']
                
//        echo "1";
//        echo "2";
    }
}