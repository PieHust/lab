<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$info = M('info');
    	$result = M('show');
    	$news = M('news');
    	$this->show = $result->limit(8)->select();
    	$this->info = $info->where('id=1')->field('content,pic')->find();
    	$this->news = $news->limit(10)->select();
    	$map['pic'] = ['NEQ',''];
    	$this->news_show = $news->where($map)->limit(3)->select();
        $this->display();
    }
}