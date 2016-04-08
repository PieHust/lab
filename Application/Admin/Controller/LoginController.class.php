<?php
namespace  Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	
	public function ajaxLogin() {
		if(!IS_AJAX) $this->error("访问页面不存在");
		$this->ajaxReturn(0);
	}
	
	public function login() {
		$this->display();
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
}