<?php

//用户中心控制器
class UcenterAction extends Action{
    //欢迎页
    function welcome(){
        $this -> display();
    }
    function dingdan(){
        $this -> display();
    }
    function address(){
        $this -> display();
    }
}