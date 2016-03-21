<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/mlab/lab/Public/home/css/main.css" />
    <link rel="stylesheet" href="/mlab/lab/Public/home/css/unslider.css" />
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        url = "/mlab/lab/Public/home/image/";
    </script>
	<script src="/mlab/lab/Public/home/js/unslider-min.js"></script>
	<title>index</title>
</head>
<body>
<div id="wrapper">
	<div id="nav">
	    <ul>
	        <li>
	        <a href="<?php echo U('index/index');?>">首页</a>
	        </li>
	        <li>
	        <a href="<?php echo U('index/aboutus');?>">关于我们</a>
	        </li>
	        <li>
	        <a href="<?php echo U('index/news');?>">新闻资讯</a>
	        </li>
	        <li>
	        <a href="<?php echo U('index/result');?>">成果展示</a>
	        </li>
	    </ul>
	</div>
	<div id="slider">
        <div class="slider-box">
            <ul>
            <?php foreach($news_show as $k=>$v):?>
                <li><img src="<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["title"]); ?>" height="400px" width="100%"></li>
            <?php endforeach;?>
                
            </ul>
	    </div>
	</div>
	<div id="about">
        <div class="aboutbg"></div>
        <div class="about-box">
	    <div class="about-pic">
	        <img src="<?php echo ($info['pic']); ?>" alt="">
	    </div>
	    <div class="about-text">
            <h2><a href="<?php echo U('index/aboutus');?>">我们是谁</a></h2>
            <p><?php echo ($info['content']); ?></p>
	    </div>
	    </div>
    </div>
	<div id="works">
        <h2>成果展示</h2>
        <div class="works-container">
            <?php foreach($show as $k=>$v):?>
            <a href="<?php echo ($v["url"]); ?>">
                <div class="works-box">
                    <img src="work.JPG" alt="">
                    <h3><?php echo ($v["title"]); ?></h3>
                </div>
            </a>
            <?php endforeach;?>
        </div>
	</div>
	<div id="news">
	    <h2>新闻资讯</h2>
	    <div class="news-container">
           <?php foreach($news as $k=>$v):?>
	        <div class="news-box">
	            <a class="news-title" href=""><?php echo ($v["title"]); ?></a>
                <div class="news-time"><?php echo date("Y-m-d",$v['date']);?></div>
	        </div>
	       <?php endforeach;?>
	    </div>
	</div>
	<div id="footer"></div>
</div>
<script src="/mlab/lab/Public/home/js/main.js"></script>	
</body>
</html>