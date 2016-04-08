<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

    	$this->display();
    }

    /**
     * [showLabInfo description] edit the introduction of laboratory
     * @return [void] [description]
     */
    public function showLabInfo(){
        $labInfo = M('info');
    	if(!IS_POST){
            $arr = $labInfo->where("id=1")->field('content')->select();
            $this->content = $arr[0]['content'];
    		$this->display();

    	}else{
            if(!empty($_FILES['infopic']['name'])){
                $name = 'infopic';
                $pic ="./Public/Uploads/".$this->upload($name);
            }else{
                $pic = '';
            }

            $data = array(
            'id' => 1,
            'content' =>$_POST['content'] , 
            'date' =>I('post.date'),
            'pic' => $pic,
            );
            
            $status = $labInfo->save($data);
            if($status){
                 $this->redirect('showLabInfo');
            }

        }
       	
    }

    /**
     * [showNewsList description]show the list of news
     * @return [void]
     */
    public function showNewsList(){

        $news = D('news');

        $this->list = $news->relation(true)->select();
        //print_r($this->list);
        //die();
        $this->display();

    }

    /**
     * [editNews description]get article's id and edit the aticle
     * @param  [int] $id [the id of the article]
     * @return [void]     
     */
    public function editNews($id){
        $news = D('news');
        $news_class = M('newsClass');
        $this->arr = $news->relation(true)->where('id='.$id)->find();
        $this->type = $news_class->select();
       
        $this->display();
    }

    /**
     * @param  [type] $id 
     * @return [void]
     */
    public function saveNews($id){
        
        $news = M('news');
        if(!empty($_FILES['infopic']['name'])){
            $name = 'infopic';
            $pic ="./Public/Uploads/".$this->upload($name);
        }else{
            $pic = '';
        }
        
        $data = array(
            'title' => I('post.title'),
            'class_id' =>I('post.class'),
            'content' => $_POST['content'],
            'pic' => $pic,
            'date' => time()
            );
        $news->where('id='.$id)->save($data);
        $this->redirect('showNewsList');
    }


    /**
     * [addNews description] add new article
     */
    public function addNews(){
        if(IS_POST){
            $news = M('news');
            if(!empty($_FILES['infopic']['name'])){
                $name = 'infopic';
                $pic ="./Public/Uploads/".$this->upload($name);
            }else{
                $pic = '';
            }
            $data = array(
                'title' => I('post.title'),
                'class_id' =>I('post.class'),
                'content' => $_POST['content'],
                'pic' => $pic,
                'date' => time()
                );
            $news->add($data);
            $this->redirect('showNewsList');
        }
        else{
            $news = D('news');
            $news_class = M('news_class');
            $this->arr = $news->relation(true)->where('id='.$id)->find(1);
            $this->type = $news_class->select();
            $this->display();
        }
       

    }

    /**
     * [delNews description]according to news's id, delete news.
     * @param  [type] $id [the news id]
     * @return [json]     []
     */
    public function delNews($id){
        $news = M('news');
        $status = $news->where('id='.$id)->delete();
        if($status){
            $this->ajaxReturn(1);
        }
        $this->ajaxReturn(0);
    }

    /**
     * [setShow description]according to news id,set to become the show on homepage.
     * @param [type] $id [description]
     */
    public function setShow($id){
        $news = M('news');
        $news->tag = 1;
        $news->where('id='.$id)->save();
        $this->redirect('showNewsList');
    }

    public function cancelSet($id){
        $news = M('news');
        $news->tag = 0;
        $news->where('id='.$id)->save();
        $this->redirect('showNewsList');

    }


    public function upload($name){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
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