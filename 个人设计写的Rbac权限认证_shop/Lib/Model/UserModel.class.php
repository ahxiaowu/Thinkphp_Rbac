<?php

class UserModel extends Model{
    
    //自动完成处理
    // 自动完成定义
    protected $_auto            =   array(
        //array(填充字段,填充内容,[填充条件,附加规则])
        array('password','md5',3,'function'),
        array('user_time','time',1,'function'),
        //array('user_time','abc',1,'callback'),
        //array('user_time','user_qq',1,'field'),
        //array('user_time','123456789',1,'string'),
    );
    
    //进行自动映射，把一个假的表单域名称 与 真实的数据表字段名称对应起来
    // 字段映射定义
    protected $_map             =   array(
        'email' => 'user_email',
        'qq'    => 'user_qq',
    );  
    
    function abc(){
        
    }
    //批量错误信息显示
    // 是否批处理验证
    protected $patchValidate    =   true;
    
    //进行表单域验证
    //protected $_validate        =   array();  // 自动验证定义
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('username','require','用户名必须填写'),
        //密码必须填写
        array('password','require','密码必须填写'),
        //确认密码必须填写/与密码保存一致
        array('password2','require','确认密码必须填写'),
        array('password2','password','两次密码必须一致',0,'confirm'),
        //验证邮箱
        array('user_email','email','邮箱格式必须正确',2),
        //验证qq号码
        //全部数字、长度5-12位、第一位非0
        array('user_qq','/^[1-9]\d{4,11}$/','qq格式必须正确'),
        //手机号码验证，正则验证
        //学历必须选择一项
        //value值必须在一个范围内 2,3,4,5，
        array('user_xueli',array(2,3,4,5),'学历必须选择一项',0,'in'),
        //爱好，必须选择两个或以上项目
        //计算$_POST['user_hobby']这个数组里边元素的个数
        array('user_hobby','check_hobby','爱好必须选择两项以上',1,'callback'),
    );
    
    //验证爱好的方法
    function check_hobby($hobby){
        //获取$_POST['user_hobby']具体信息值
        //这个check_hobby被调用的时候已经把$_POST['user_hobby']
        //当成是参数给check_hobby了
        //show_bug($hobby);
        if(count($hobby) < 2){
            return false;
        } else {
            return true;
        }
    }
    
    //自定义个性方法进行用户名和密码校验
    function checkNamePassword(){
        //sljdlsjdlk
    }
}