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
    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/admin/js/bootstrap.min.js"></script>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i>退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> 主页</a>
                    </li>
                    <li>
                        <a href="<?php echo U(showlabinfo);?>"><i class="fa fa-fw fa-table"></i> 实验室概况</a>
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
                                <a href="<?php echo U('shownewslist');?>">文章列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('addnews');?>">添加新闻</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <style>
    th,td{
        width:25%;
        border: 1px solid gray;
        text-align: center;
    }
</style>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    主页
                    <small>总体信息展示</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <i class="fa fa-info-circle"></i> <strong>系统介绍</strong>
                    该系统采用LAMP环境搭建，具体信息见下表：
                    <br/>
                    <table style = "border:1px solid gray;width:100%;">
                        <tr>
                            <th>服务器地址</th>
                            <th>语言</th>
                            <th>数据库</th>
                            <th>服务器环境</th>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $_SERVER['HTTP_HOST'],':',$_SERVER['SERVER_PORT'];?></td>
                            <td>
                                <?php echo php,PHP_VERSION;?></td>
                            <td>Mysql</td>
                            <td>
                                <?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3"> <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>新闻数</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>成果展示数</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.row --> </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Morris Charts JavaScript -->
    <script src="/Public/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/Public/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/Public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>