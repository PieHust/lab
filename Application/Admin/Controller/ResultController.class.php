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
			$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}
	}

	public function saveResult($id=''){
		if(IS_POST){
			$time = time();
			if(!empty($file=$_FILES['infozip']['name'])){
				$name = 'infozip';
				$zipPath = "./Public/Uploads/".$this->upload($name);
				$zip = new \ZipArchive();
				if($zip->open($zipPath))
				{
					
					$zip->extractTo("./Public/Uploads/".$time);
					$zip->close();
					$zipPath = "Public/Uploads/".$time.'/'.substr($file, 0,strlen($file)-4);
				}
			}else{
				$zipPath='';
			}
			$data = array(
				'title' => I('post.title'),
				'class_id' =>I('post.class'),
				);
			if(!empty($zipPath)){
				$data['url'] = $zipPath;
			}
			$show = M('show');

			if(!empty($id)){
				$show->where('id='.$id)->setField($data);
			}
			else{
				$show->data($data)->add();
			}
			$this->redirect('resultList');
		}
		else{
			$this->error('页面不存在');
		}

	}

	public function editResult($id){
		$show = M('show');
		$this->arr1 = $show->where("id=".$id)->find();
		$showClass = M('showClass');
		$this->arr = $showClass->select();
		//print_r($this->arr);
		//die("get");
		$this->id = $id;
		$this->display();
	}

	public function upload($name){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('zip');// 设置附件上传类型    
        $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录  
        $upload->saveName = 'time';
        $info   =   $upload->uploadOne($_FILES[$name]);    
        if(!$info) {// 上传错误提示错误信息        
            $this->error($upload->getError());    
        }else{// 上传成功 获取上传文件信息         
            return $info['savepath'].$info['savename'];   
             
        }
    }

    
}