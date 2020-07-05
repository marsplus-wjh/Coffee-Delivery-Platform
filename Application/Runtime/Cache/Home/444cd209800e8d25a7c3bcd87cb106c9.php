<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Geek Coffee OnLine</title>
    <link rel="shortcut icon" href="/coffee/Public/img/icon.ico">

	<!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/coffee/Public/Bootstrap/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/coffee/Public/Bootstrap/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/coffee/Public/Bootstrap/js/bootstrap.min.js"></script>
    <script>
    </script>
</head>
<div class="container">
        <div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="margin-top: 10%;"><a href="/coffee/index.php/Home/Index/index" style="color:white; text-decoration: none;">杰 客 云 咖啡</a></h3></div>
            <div class="col-md-offset-9">
                <ul class="nav nav-pills" style="margin-top: 1%;">
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/coffee/index.php/Home/Person/index?id=<?php echo ($id); ?>"><?php echo ($name); ?></a></button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/coffee/index.php/Home/Login/logout">Logout</a></button></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-5 col-md-2;">
                <h2><?php echo ($name); ?>的订单记录</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <table class="table">
                <thead><tr><th>Goods'name</th><th>Price</th><th>Num</th><th>Candy</th><th>Cold</th><th>BooikngName</th><th>Class</th><th>Phone</th><th>Time</th><th>Status</th></tr></thead>
                <tbody>
                <?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($li["goodsname"]); ?></td>
                        <td><?php echo ($li["price"]); ?></td>
                        <td><?php echo ($li["num"]); ?></td>
                        <td><?php if($li['candy'] == 0): ?>0%<?php elseif($li['candy'] == 1): ?>25%<?php elseif($li['candy'] == 2): ?>50%<?php elseif($li['candy'] == 3): ?>75%<?php else: ?>100%<?php endif; ?></td>
                        <td><?php if($li['cold'] == 0): ?>冰<?php elseif($li['cold'] == 1): ?>常温<?php else: ?>热<?php endif; ?></td>
                        <td><?php echo ($li["name"]); ?></td>
                        <td><?php echo ($li["add"]); ?></td>
                        <td><?php echo ($li["phone"]); ?></td>
                        <td><?php echo ($li["time"]); ?></td>
                        <td><?php if($li['status'] == 0): ?>未接单<?php elseif($li['status'] == 1): ?>已接单<?php else: ?>已拒绝<?php endif; ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row" style="position:absolute;left: 42%;top: 92%;">
            <div class="footer_f">
                <div class="footer text-center" style="padding:10px 0; color:#999;">中软ETC & Mars 版权所有@ 2017
                </div>
            </div>
        </div>
    </div>
</body>
</html>