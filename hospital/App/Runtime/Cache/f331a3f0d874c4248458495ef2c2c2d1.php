<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>中国医保信息网</title>

    <!-- Bootstrap core CSS -->
    <link href="Public/css/bootstrap.min.css" rel="stylesheet">
	<!-- 536 CSS -->
	<link href="Public/css/536.css" rel="stylesheet">

	<!-- JQuery -->
	<script src="Public/js/jquery.min.js"></script>
	<script src="Public/js/bootstrap.min.js"></script>
	<script type="text/ecmascript" src="Public/js/md5.js"></script>


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Public/js/ie-emulation-modes-warning.js"></script>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script type="text/javascript">
		$(document).ready(function() {
			$("#menu-code-index").ready(function(){
			var idx = $("#menu-code-index").val();
				$('li[data-service-index="' + idx + '"]').addClass("active");
			});
			
		});
	</script>
	<!-- Custom styles for this template -->
	<link href="Public/css/bootstrap-datetimepicker.css" rel="stylesheet">

  </head>
  <body style="padding-top:0px">
		<div id="divBG"><img src="Public/images/003.png"/></div>
		<div id="divBG2"><img src="Public/images/002.png" style="margin-left:10px"/></div>
		<div id="divBG2">
			<div class="row" style="padding-top:260px">
				<div class="col-md-2 col-md-offset-5">
					<form>
						<input type="text" name="user_name" id="user_name" class="form-control " placeholder="用户名" required style="border-radius:0px;height:40px;margin-bottom:10px;background:url(Public/images/004.png);color:#6DBE00">
						<input type="password" id="user_passwd" name="user_passwd" placeholder="请输入密码" class="form-control" required style="border-radius:0px;height:40px;margin-bottom:10px;background:url(Public/images/004.png);color:#6DBE00">
						<button type="button" id="loginButton" name="loginButton" class="btn login-btn" style="font-size:18px">登录</button>
					</form>
				</div>
			</div>
		</div>
<!-- 		<div class="container">
		  <div class="row">
			<div class="col-md-10 col-md-offset-1" style="background-image:url(Public/images/002.png);width:100%;height:100%">
					  <div class="col-md-4 col-md-offset-4 login-form">
					  		<form class="form-signin" role="form">
								<h3 class="form-signin-heading"><img src="Public/images/LOGO.png" width=15% height=15%>&nbsp;医保信息网</h3>
								<input type="text" name="user_name" id="user_name" class="form-control " placeholder="用户名" required>
								<input type="password" id="user_passwd" name="user_passwd" placeholder="请输入密码" class="form-control" required>
								<p></p>
								<button type="button" id="loginButton" name="loginButton" class="btn btn-primary">登录</button>
					  		</form>
					  </div>
			      </div>
		  </div>
	  </div>  -->
    <!-- /.container -->

      <!-- Load JS here for greater good =============================-->
	      <script src="Public/js/jquery-1.8.3.min.js"></script>
    <script src="Public/js/bootstrap.min.js"></script>
    <script src="Public/js/jquery.placeholder.js"></script>
	<script src="Public/js/offcanvas.js"></script>
	<script src="Public/js/jquery.PrintArea.js"></script>
	<script src="Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="Public/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script src="Public/js/menu-select.js"></script>
	<script src="Public/js/common.js"></script>
	<script src="Public/js/sco.message.js"></script>
	<script type="text/javascript">
	var URL = "__URL__";
	var APP= "__APP__";
	</script>
      <script src="Public/js/jquery-1.8.3.min.js"></script>
      <script src="Public/js/bootstrap.min.js"></script>
      <script src="Public/js/jquery.placeholder.js"></script>
      <script src="Public/js/offcanvas.js"></script>
      <script src="Public/js/jquery.PrintArea.js"></script>
      <script src="Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script src="Public/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
 
	<script type="text/javascript">
		$(document).ready(function() {
			
			//登陆
			$("#loginButton").click(function(){
				var user_name = $("#user_name").val();
				var user_passwd = $("#user_passwd").val();
				
				if(!user_name){
					alert("请填入用户名");
					return;
				}
				if(!user_passwd){
					alert("请填入密码");
					return;
				}
				var timestamp = Math.round(new Date().getTime()/1000);				
				var signature = hex_md5(hex_md5(user_passwd) + timestamp);
				var post_data = "username=" + user_name +
						"&timestamp=" + timestamp +
						"&signature=" + signature;

				$.post("__APP__/Index/login",post_data,
				function(data,status){
					if(data == 0){
						self.location = "__APP__/Import"; 
					}else if(data == -1){
						alert("用户名或密码错误");
					}else if(data == -2){
						alert("登陆超时");
					}
				});
				
			});
		});
	</script>
	
	<script type="text/javascript"> 
		document.onkeydown = function (e) { 
			var theEvent = window.event || e; 
			var code = theEvent.keyCode || theEvent.which; 
			if (code == 13) { 
				$("#loginButton").click(); 
			} 
		} 
	</script> 
	
  </body>
</html>