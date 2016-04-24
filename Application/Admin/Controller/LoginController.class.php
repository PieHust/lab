<?php
namespace  Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	
	
	public function login() {
		$this->display();
	}

	public function checkLogin(){
		
		if($this->checkVerify(I('post.verify'))){
			//print_r(U('index/index'));
			$admin = M('admin');
			$pass = $admin->where('name='.I("post.username")." AND lock!=1")->find(1);
			
			if($pass['password'] == md5(I("post.password"))){
				$_SESSION['name'] = I('post.username');
				//$_SESSION['uid'] = $pass['id'];
				$this->success('success',U('index/index'));
			}else{
				$this->error("The name or the password is error.");
			}
		}
		else{
			$this->error("验证码错误");
		}
	}

	public function logOut()
	{
		unset($_SESSION['name']);
		$this->redirect("Login/login");
	}
	
	public function verify(){
		$config = array(
				'fontSize'=>18,
				'length' => 4,
				'useNoise' => false,
		);
		$verify = new \Think\Verify($config);
		$verify->entry();
	}

	private function checkVerify($code){

		$verify = new \Think\Verify();
		return $verify->check($code);
	}
}