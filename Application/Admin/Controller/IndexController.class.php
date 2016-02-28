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
        $news_class = M('news_class');
        $this->arr = $news->relation(true)->where('id='.$id)->find(1);
        $this->type = $news_class->select();
        $this->display();
    }
    /**
     * [addNews description] add new article
     */
    public function addNews(){

    }

    /**
     * [delNews description]according to news id, delete news.
     * @param  [type] $id [the news id]
     * @return [json]     []
     */
    public function delNews($id){
        $news = M('news');
        $status = $news->where('id='.$id)->delete();
        if($status){
            $this->ajaxReturn('ok');
        }
        $this->ajaxReturn('error');
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

    
}