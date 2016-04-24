<?php
namespace  Admin\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function __construct(){
		parent::__construct();
		if(!session('?name')){
			$this -> error('Please log in first',U('login/login'),3);
		}
	}
}