<?php
class LoginAction extends Action{
    // 显示登陆页
    function index(){
        $this->display();
    }

    // 登陆操作
    function login(){
        $checkCode = session('verify');
        $code  = I('codes','','md5');
        if($checkCode!=$code) $this->error('验证码不正码!');

        $uname = I('username','');
        $pass  = I('password','','md5');
        $user = M('user')->where(array('username'=>$uname))->find();

        if(!$user || ($pass!=$user['password'])){
            $this->error('账号或密码错误');
        }

        $data = array(
            'id'=>$user['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip()
        );
        M('user')->save($data);
        session('username', $uname);
        session(C('USER_AUTH_KEY'),$user['id']);
        session('ip',  get_client_ip());

        // 超级管事员识别
        if($user['username']==C('RBAC_SUPERADMIN')){
            session(C('ADMIN_AUTH_KEY'),true);
        }
        //读取用户权限
        import('ORG.Util.RBAC');
        RBAC::saveAccessList();
     
        
        $this->redirect(GROUP_NAME.'/Index/index');
    }

    // 验证码
    function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
}