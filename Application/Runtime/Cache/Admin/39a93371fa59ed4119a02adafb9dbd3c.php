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


        <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">新闻资讯</h1>
                <ol class="breadcrumb">
                    <li> <i class="fa fa-dashboard"></i>
                        <a href="index.html">主页</a>
                    </li>
                    <li class="active"> <i class="fa fa-table"></i>
                        新闻资讯
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>新闻文章列表</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>标题</th>
                                <th>发布时间</th>
                                <th>类别</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $k => $v):?>
                            <tr>
                                <td><?php echo ($v["title"]); ?></td>
                                <td><?php echo date('Y-m-d',$v['date']);?></td>
                                <td><?php echo ($v["type"]); ?></td>
                                <td>
                                    <a href="<?php echo U('editnews',array('id' => $v['id']));?>" class='btn-danger'> 编辑</a>
                                    <span  class='btn-danger delete' 
                                    ids="<?php echo U('delnews',array('id' => $v['id']));?>"> 删除</span>
                                    <?php if($v['tag']==0):?>
                                    <a href="<?php echo U('setshow',array('id' => $v['id']));?>" class='btn-danger'> 设置展示</a>
                                <?php else:?>
                                    <a href="<?php echo U('cancelset',array('id' => $v['id']));?>" class='btn-danger'> 取消设置</a>
                                <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                           
                              
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $(".delete").each(function(i){

        $(this).click(function(){
            $.ajax({
                url:$('.delete').eq(i).attr('ids'),
                type:"GET",
                success:function(data){
                    if(data === 1){
                        alert("删除成功");
                        $('.delete').eq(i).parent().parent().remove();
                    }else{
                        alert("删除失败");
                    }
                }

            });
  
        });

    });
});
    
    

    
</script>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Morris Charts JavaScript -->
    <script src="/mlab/lab/Public/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/mlab/lab/Public/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/mlab/lab/Public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>