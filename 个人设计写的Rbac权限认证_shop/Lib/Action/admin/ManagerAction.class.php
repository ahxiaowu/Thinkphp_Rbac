<?php

//后台管理员控制器

class ManagerAction extends Action{
    //登录系统
    function login(){
        //读取语言变量信息
        //L(名称)  读取指定语言信息
        //L()     把全部语言以数组形式给我们返回
        //show_bug(L());
        
        
        
        if(!empty($_POST)){
            //判断验证码是否正确
            //$_SESSION['verify']
            //让用户提交过来的验证码与session的做比较
            if(md5($_POST['captcha']) == $_SESSION['verify']){
                //用户名和密码校验
                //在数据model模型里边，自定义一个方法校验用户名和密码
                $manager_model = D("Manager");
                $user_info = $manager_model -> checkNamePwd($_POST['mg_name'],$_POST['mg_pwd']);
                //如果$user_info不等于false，就说明用户名和密码是正确的
                if($user_info !== false){
                    //持久化用户信息(id和名字)
                    session("mg_name",$user_info['mg_name']);
                    session("mg_id",$user_info['mg_id']);
                    $this -> redirect("Index/index");
                } else {
                    echo "用户名或密码错误！";
                }
            } else {
                echo "验证码不正确";
            }
        }
        
        $this -> assign('language',L());
        $this -> display();
    }
    
    //退出系统
    function logout(){
        //删除session信息
        session(null);
        $this -> redirect("Manager/login");
    }
    
    //生成验证码
    function verifyImg1(){
        //手动加载对应的类文件  include()引入
        //echo Image::buildImageVerify();
        
        //ThinkPHP/Common/common.php
//        show_bug(class_exists('World'));
//        //shop/Lib/hello/world.class.php
//        import("@.hello.world");  
//        show_bug(class_exists("World"));
//        
//        show_bug(class_exists('Orange'));
//        import("@.apple.orange");
//        show_bug(class_exists('Orange'));
        
        //引入框架核心类文件
//        show_bug(class_exists('Driver'));
//        import("think.car.driver");
//        show_bug(class_exists('Driver'));
        
        //第三方类库文件引入
//        show_bug(class_exists('Pink'));
//        import("ORG.red.pink");
//        show_bug(class_exists('Pink'));
        
//        import("ORG.Util.Image");
//        echo Image::buildImageVerify();
        
        //引入特殊类文件
//        show_bug(class_exists('Banana'));
//        //shop/Lib/apple/banana/good/fresh.class.php
//        import("@.apple.banana#good#fresh");
//        show_bug(class_exists('Banana'));
        
    }
    
    //生成验证码
    function verifyImg(){
        import("ORG.Util.Image");
        echo Image::buildImageVerify();
    }
    
    function showlist(){
        //获得全部管理员信息
        $info = D("Manager")->select();
        
        //获得角色信息
        $role = D("Role")->select();
        //把角色变为一维数组信息 array(id值->名称,id值->名称...)
        $role_info = array();
        foreach($role as $k => $v){
            $role_info[$v['role_id']] = $v['role_name'];
        }
        $this -> assign('role_info', $role_info);
        
        
        $this -> assign("info", $info);
        $this -> display();
    }
    //添加管理员
    function add(){
        //判断form提交
        if(!empty($_POST)){
            $manager_model = D("Manager");
            //给manager存入数据
            $_POST['mg_pwd'] = "123456";
            $_POST['mg_time'] = time();
            $manager_model -> create();
            $rst = $manager_model -> add();
            if($rst){
                $this -> success("添加管理员成功",U("Manager/showlist"));
            }
        }else {
            //获得角色信息
            $role = D("Role")->select();
            //把角色变为一维数组信息 array(id值->名称,id值->名称...)
            $role_info = array();
            foreach($role as $k => $v){
                $role_info[$v['role_id']] = $v['role_name'];
            }
            $this -> assign('role_info', $role_info);

            $this -> display();
        }
    }
}
