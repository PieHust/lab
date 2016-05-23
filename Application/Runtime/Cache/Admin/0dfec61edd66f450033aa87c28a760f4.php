<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台登陆页面</title>
	<script src="/mlab/lab/Public/admin/js/jquery.js"></script>
	<style>
* {
	margin: 0px;
	padding: 0px;
	font-family: "微软雅黑";
	font-size: "14px";
}

.login {
	margin: 100px auto;
	width: 500px;
	height: 280px;
	background: lightgray;
	border-radius: 5px;
}

.login input {
	width: 200px;
	height: 28px;
	line-height: 28px;
	border-radius: 0 5px 5px 0;
	border: 0px;
}

.login label {
	display: inline-block;
	width: 60px;
	height: 28px;
	line-height: 28px;
	text-align: center;
	background: green;
	margin-left: 100px;
}

.login input[type=submit] {
	display: block;
	background: gray; margin : 0 auto; border-radius : 5px;
	width: 200px;
	border-radius: 5px;
	margin: 0 auto;
}

.ahover:hover {
	cursor: pointer;
	background: red !important;
}

span {
	margin-left: 100px;
}

.error {
	color: red;
}
</style>
</head>
<body>
	<div class='login'>
		<h2 style="text-align: center; margin-top: 10px;">后台登录界面</h2>
		<br />
		<form action="<?php echo U('login/checkLogin');?>" method="post">
			<label>用户名</label>
			<input type="text" name="username" />
			<br>
			<span></span>
			<br>
			<label>密&nbsp;&nbsp;码</label>
			<input type="password"
				name="password" />
			<br>
			<span></span>
			<br>
			<label>验证码</label>
			<input
				type="text" name="verify" style="width: 80px;" />
			<div
				style="float: right; width: 100px; margin-right: 140px; background: red; height: 28px;">
				<img src="<?php echo U('login/verify');?>" id="verify" style="width:100%;height:100%;"></div>
			<br>
			<span></span>
			<br>
			<br>
			<input type="submit" class='ahover' value="登录"></form>

	</div>
	<script>
		var validate={
			username : false,
			password : false,
			verify	:false,
		}
		$(function(){
			$('#verify').click(function(){
				$(this).attr('src',"/mlab/lab/index.php/Admin"+"/login/verify/"+Math.random());
			});
			/*var form = $('form');
			form.submit(function(){
				console.log(1);
				if(validate.username&&validate.password&&validate.verify){
					return true;
				}
				$('input[name=username]',form).trigger('blur');
				$('input[name=password]',form).trigger('blur');
				$('input[name=verify]',form).trigger('blur');
				return false;
			});
	
			$('input[name=username]',form).blur(function(){
			
				if($.trim($(this).val())==''){
				
					var msg = '用户名不能为空';
					
					$(this).next().next().html(msg).addClass('error');
				}else{
					$(this).next().next().html('');
					validate.username = true;
				}
			})
	
			$('input[name=password]',form).blur(function(){
				if($.trim($(this).val())==''){
					var msg = "密码不能为空";
					
					$(this).next().next().html(msg).addClass('error');
				}else{
					$(this).next().next().html('');
					validate.password = true;
				}
				
				$.post({
					url:<?='"'.U('login/ajaxlogin').'"'?>,
					type:"POST",
					data:{
						username:$('input[name=username]',form).val(),
						password:$(this).val(),
					},
					success:function(status){
						if(status){
							$(this).next().next().html("用户名或密码错误").addClass('error');
						}else{
							$(this).next().next().html("");
							validate.password = true;
						}				
					}
				});
			})
	
			$('input[name=verify]',form).blur(function(){
				if($.trim($(this).val())==''){
					var msg = "验证码不能为空";
					
					$(this).next().next().next().html(msg).addClass('error');
				}else{
					$(this).next().next().next().html('');
					validate.verify = true;
				}
			})*/
		});
	</script>
</body>
</html>