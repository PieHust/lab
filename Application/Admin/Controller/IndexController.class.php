<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

    	$this->display();
    }

    /**
     * 编辑实验室概况，如果没有新的提交则显示实验室概况信息。
     */
    public function showLabInfo(){
        $labInfo = M('info');
    	if(!IS_POST){
            $arr = $labInfo->where("id=1")->field('content')->select();
            $this->content = $arr[0]['content'];
    		$this->display();

    	}else{
            $data = array(
            'id' => 1,
            'content' =>$_POST['content'] , 
            'date' =>I('post.date'),
            );
            $status = $labInfo->save($data);
            if($status){
                 $this->redirect('showLabInfo');
            }

        }
       	
    }
}