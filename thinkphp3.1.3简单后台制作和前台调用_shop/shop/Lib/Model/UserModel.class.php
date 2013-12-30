<?php
class UserModel extends Model{
	
	//批量错误信息显示
	protected $patchValidate = true;


	//表单验证
	protected $_validate = array(
		array('username','require','用户名必须填写!'),
		array('password','require','密码必须填写!'),
		array('password2','require','确认密码必须填写!'),
		array('password2','require','确认密码必须填写!'),
		array('password2','password','两次密码不一致',0,'confirm'),
		
		//验证邮箱
		array('user_email','email','邮箱格式必须正确'),
		
		//验证QQ号码
		array('user_qq','/^[1-9]\d{4,11}$/','QQ号码不正确!'),
		
		//验证学历  value值必须在一个范围内2,3,4,5 
		array('user_xueli',array(2,3,4,5),'学历必须选择一项',0,'in'),
		
		//验证爱好 必须选择两个或以上项目
		array('user_hobby','check_hobby','爱好必须选择两个或以上项目',1,'callback')
	);
	
	
	//验证爱好的方法
	function check_hobby($user_hobby){
		//获得表单具体信息值
		//这个方法被调用的时候已经把$_POST['user_hobby']传参给了方法了
		if(count($user_hobby)<2){
			return false;
		}else{
			return true;
		}
	}
	
}