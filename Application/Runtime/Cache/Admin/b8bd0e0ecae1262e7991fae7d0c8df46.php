<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Geek Coffee Management</title>
    <link rel="shortcut icon" href="/coffee/Public/img/icon.ico">

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/coffee/Public/Bootstrap/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/coffee/Public/Bootstrap/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/coffee/Public/Bootstrap/js/bootstrap.min.js"></script>
	<script>
        $(function(){
            $(".title").find("ul li:eq(4)").addClass("active");
        });
        $(document).ready(function(){
            var T = setInterval(function(){
                $.post("/coffee/index.php/Admin/Index/new_booking",function(data){
                    var json = eval("(" + data + ")");
                    if(json.num != 0)
                    {
                        $("#new").html(json.num);
                    }
                    if(!json.flag)
                        clearInterval(T); 
                });
            },100);
            $("#submit").click(function(){
                alert("OK!");
            });
        });
    </script>
</head>
<body style="background:url(/coffee/Public/img/main_bg.png) repeat-x;">
<div class="container-fluid">
    <div class="row">
        <h1 style="text-align: center;">杰客云咖啡后台管理</h1>
        <input type="hidden" id="adminid" value="<?php echo ($username); ?>">
    </div>
    <div class="row">
        <div class="title col-sm-offset-3 col-sm-6">
            <ul class="nav nav-pills" style="margin: 2px;">
              <li role="presentation"><a href="/coffee/index.php/Admin/Index/index" style="color: white;">管理用户</a></li>
              <li role="presentation"><a href="/coffee/index.php/Admin/Index/booking" style="color: white;">新增订单<span id="new" class="badge badge-default"></span></a></li>
              <li role="presentation"><a href="/coffee/index.php/Admin/Index/old_booking" style="color: white;">历史订单</a></li>
              <li role="presentation"><a href="/coffee/index.php/Admin/Index/goods" style="color: white;">管理商品</a></li>
              <li role="presentation"><a href="/coffee/index.php/Admin/Index/admin" style="color: white;">管理管理员</a></li>
              <li role="presentation"><a href="/coffee/index.php/Admin/Login/logout" style="color: white;">注销</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6" style="margin-top: 1%; background-color: #FFFFFF; height: 500px; border: #CCC solid 1px; box-shadow: 2px 2px 10px #c0c0c0;" >
            <div class="page-header">
                <h3 style="text-align: center;">管理管理员</h3>
            </div>
            <form class="form-horizontal" id="infoform" action="/coffee/index.php/Admin/Index/modify_user" method="post" style="margin-top: 10%;">
                <input type="hidden" name="id" id="id" value="<?php echo ($li[0]['id']); ?>"/>
                <fieldset>
                    <div class="control-group col-sm-offset-3 col-sm-6" style="margin-top: 50px;">
                        <label class="control-label col-sm-3" for="username">帐号</label>
                        <div class="controls col-sm-4">
                            <input type="text" name="username" class="input-xlarge" id="username" value="<?php echo ($li[0]['username']); ?>" />
                        </div>
                    </div>
                    <div class="control-group col-sm-offset-3 col-sm-6" style="margin-top: 10px;">
                        <label class="control-label col-sm-3" for="password">密码</label>
                        <div class="controls col-sm-4">
                            <input type="password" name="password" class="input-xlarge" id="password" value="<?php echo ($li[0]['password']); ?>" />
                        </div>
                    </div>
                    <div class="form-actions col-sm-offset-7 col-sm-6" style="margin-top: 5%;">
                        <input type="submit" id="submit" class="btn btn-primary btn-large" value="修改" />
                    </div>                  
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
         <div class="footer_f">
            <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">中软ETC & Mars 版权所有@ 2017
            </div>
        </div>
    </div>
</div>
</body>
</html>