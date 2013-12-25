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

        $uname = I('uname','');
        $pass  = I('pass','','md5');
        $user = M('user')->where(array('uname'=>$uname))->find();

        if(!$user || ($pass!=$user['pass'])){
            $this->error('账号或密码错误');
        }

        $data = array(
            'id'=>$user['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip()
        );
        M('user')->save($data);

        $this->redirect(GROUP_NAME.'/Index/index');
    }

    // 验证码
    function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
}