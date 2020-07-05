<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Geek Coffee Register</title>
	<link rel="shortcut icon" href="/coffee/Public/img/icon.ico">

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="/coffee/Public/Bootstrap/css/bootstrap.min.css">
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="/coffee/Public/Bootstrap/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="/coffee/Public/Bootstrap/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){
			$("#register").click(function(){
				var d = $("#registerform").serialize();
				$.post("/coffee/index.php/Home/Login/register",d,function(data){
					if(data == "OK")
					{
						window.location.href="/coffee/index.php/Home/Index/index";
					}
					else
					{
						$("#error").css("display","block");
						$("#errorcontent").html(data);
					}
				});
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="color:white; margin-top: 10%;"><a href="/coffee/index.php/Home/Index/index" style="color:white; text-decoration: none;">杰 客 云 咖啡</a></h3></div>
            <div class="col-md-offset-10">
                <ul class="nav nav-pills" style="margin-top: 1%;margin-left: 30%;">
                  <li role="presentation"><a style="color: white; font-size: 20px;" href="/coffee/index.php/Home/Login/index">Register</a></li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 1%;">
        	<div class="col-md-12">
        		<img src="/coffee/Public/img/login.jpg" style="width: 100%;">
        	</div>
        	<div style="z-index: 1;position: absolute;top: 22%;left: 69%;background-color: white; padding: 3% 3% 3% 3%; background-color: #000000;">
        		<form style="color:white;" id="registerform">
				  <div class="form-group">
				    <label for="exampleInputName2">UserName</label>
				    <input type="text" id="exampleInputName2" class="form-control" name="username" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" id="exampleInputPassword1" class="form-control" name="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputName2">Name</label>
				    <input type="text" class="form-control" name="name" placeholder="Name">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputName2">telephone</label>
				    <input type="text" class="form-control" name="phone" placeholder="Phone">
				  </div>
				  <div id="error" class="form-group" style="display: none;">
				    <label id="errorcontent" for="exampleInputName2" style="color:white;"></label>
				  </div>
					<div></div>
				  <button type="button" id="register" class="btn btn-default">Register</button>
				</form>
        	</div>
        </div>
	</div>
	<div class="row" style="position:absolute;left: 42%;top: 92%;">
		<div class="footer_f">
			<div class="footer text-center" style="padding:10px 0; color:#999;">中软ETC & Mars 版权所有@ 2017
			</div>
		</div>
	</div>
</body>
</html>