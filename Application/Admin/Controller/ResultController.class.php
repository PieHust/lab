<?php
namespace Admin\Controller;
use Think\Controller;

class ResultController extends Controller{

	public function resultList(){
		$show = D('show');
		$this->list = $show->relation(true)->select();
		$this->display();
	}

	public function addResult(){
		$showClass = M('showClass');
		$this->arr = $showClass->select();
		$this->display();
	}

	public function delResult($id){
		$show = M('show');
		$status = $show->where('id='.$id)->delete();
		if($status){	
			$this->ajaxReturn("ok");
		}else{
			$this->ajaxReturn("error");
		}
	}

	public function saveResult(){

	}

	public function editResult($id){
		$this->display();
	}
}