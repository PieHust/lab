<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台管理</title>


    <!-- Bootstrap Core CSS -->
    <link href="/mlab/lab/Public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/mlab/lab/Public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/mlab/lab/Public/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/mlab/lab/Public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/mlab/lab/Public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/mlab/lab/Public/admin/js/bootstrap.min.js"></script>
    <style>
        *{
            font-family: "微软雅黑";
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">后台管理</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b style="font-size: 20px;"><?=$_SESSION['name']?></b><i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('login/logout');?>"><i class="fa fa-fw fa-power-off"></i>退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo U('index/index');?>"><i class="fa fa-fw fa-dashboard"></i> 主页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('index/showlabinfo');?>"><i class="fa fa-fw fa-table"></i> 实验室概况</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> 成果管理 <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="<?php echo U('Result/resultlist');?>">成果列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Result/addresult');?>">添加成果</a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> 新闻管理 <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo U('index/shownewslist');?>">文章列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('index/addnews');?>">添加新闻</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        
<link href="/mlab/lab/Public/admin/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<script src="/mlab/lab/Public/admin/js/fileinput.min.js" type="text/javascript"></script>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">新闻编辑</h1>
                <ol class="breadcrumb">
                    <li> <i class="fa fa-dashboard"></i>
                        <a href="index.html">主页</a>
                    </li>
                    <li class="active"> <i class="fa fa-edit"></i>
                        新闻编辑
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <form action="<?php echo U('savenews',array('id'=> $arr['id']));?>" method="post" enctype="multipart/form-data">
            <div class="row">

                <div class="col-lg-3">
                    <label class="control-label">文章标题</label>
                    <input type="text" placeholder="标题" name='title' class="form-control" value="<?php echo ($arr["title"]); ?>"></div>
                <div class="col-lg-6">
                    <label class="control-label">展示图片</label>
                    <input id="file-0a" class="file" type="file" multiple data-min-file-count="0" name='infopic'>
                    <br></div>
                <div class="col-lg-3">
                    <label class="control-label">文章类别</label>
                    <select class="form-control" name="class" id="sel-opt">
                        <?php foreach($type as $k=> $v):?>
                        <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["class_name"]); ?></option>
                        <?php endforeach;?></select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <script id="container" name="content" type="text/plain"><?php echo ($arr["content"]); ?></script>

                    <button type="submit" class="btn btn-default">提交修改</button>

                </div>

            </div>
        </form>
        <!-- /.row --> </div>
    <!-- /.container-fluid -->

</div>

<!-- 配置文件 -->
<script type="text/javascript" src="/mlab/lab/Public/admin/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/mlab/lab/Public/admin/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">var ue = UE.getEditor('container');</script>
<script type="text/javascript">$("option[value=<?php echo ($arr["class_id"]); ?>]").attr("selected",true);</script>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Morris Charts JavaScript -->
    <script src="/mlab/lab/Public/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/mlab/lab/Public/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/mlab/lab/Public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>