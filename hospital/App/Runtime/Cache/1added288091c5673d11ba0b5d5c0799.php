<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
	<!-- 536 CSS -->
	<link href="Public/css/offcanvas.css" rel="stylesheet">
	<!-- 536 CSS -->
	<link href="Public/css/536.css" rel="stylesheet">
	
  </head>

  <body>
	
	

	<input id="menu-code-index" value="<?php echo ($selected_menu); ?>" type="hidden" />
	
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container" style="background-image:url(Public/images/001.png);background-repeat:no-repeat;height:96px">
        <div class="navbar-header" style="padding-top:30px;padding-left:15px">
		<?php if($user["user_type"] == 1): ?><img src="Public/images/logo.png"/>
		<?php elseif($user["user_type"] == 2): ?>
		  <a href="__APP__/Import/index"><img src="Public/images/logo.png"/></a>
		<?php else: ?>
		  <img src="Public/images/logo.png"/><?php endif; ?>
        </div>
        <div class="nav navbar-nav navbar-right" style="margin-right:140px;">
		<?php if($user["user_type"] == 1): ?><ul class="nav navbar-nav">
            <li data-service-index="c1"><a href="__APP__/Admin/hospital">医院管理</a></li>
			<li data-service-index="c6"><a href="__APP__/Admin/customer">用户管理</a></li>
			<li data-service-index="c2"><a href="__APP__/Admin/news">新闻管理</a></li>			
            <li data-service-index="c3"><a href="__APP__/Admin/notice">通知管理</a></li>
			<li data-service-index="c4"><a href="__APP__/Admin/suggest">反馈管理</a></li>
			<li data-service-index="c7"><a href="__APP__/Admin/log_login">日志管理</a></li>
			<li data-service-index="c5"><a href="__APP__/Admin/setting">个人设置</a></li>
			<li><form class="navbar-form navbar-right" role="form" method="post" action="__APP__/Index/logout"><button type="submit" class="btn btn-primary" style="font-size:12px;margin-top:48px;border-radius:0px;padding:0px 10px;background-color:#6DBE00;border-color:#6DBE00">退出</button></form></li>
          </ul>
		<?php elseif($user["user_type"] == 2): ?>
		  <ul class="nav navbar-nav">
<!--             <li data-service-index="c1"><a href="__APP__/Hospital/import">数据导入</a></li>
			<li data-service-index="c2"><a href="__APP__/Hospital/query">医保查询</a></li>			
            <li data-service-index="c3"><a href="__APP__/Hospital/customer">用户管理</a></li>
			<li data-service-index="c4"><a href="__APP__/Hospital/setting">个人设置</a></li> -->
			<li>
				<a href="__APP__/Index/about" style="font-size:14px;width:90px;padding-right:0px;padding-top:45px">关于我们&nbsp;|&nbsp;</a>
			</li>
			<li>
				<a href="__APP__/Index/contact" style="font-size:14px;width:90px;padding-right:0px;margin-left:-26px;padding-top:45px">联系我们&nbsp;|&nbsp;</a>
			</li>
			<li>
				<a href="__APP__/Suggest/index" style="font-size:14px;width:80px;padding-right:0px;margin-left:-28px;padding-top:45px">意见反馈</a>
			</li>
			<li><a href="__APP__/Hospital/setting" style="font-size:12px;width:95px;padding-right:0px;color:#6DBE00;padding-top:45px">您好! <?php echo ($user["user_name"]); ?></a></li>
			<li><form class="navbar-form navbar-right" role="form" method="post" action="__APP__/Index/logout"><button type="submit" class="btn btn-primary" style="font-size:12px;margin-top:38px;border-radius:0px;padding:0px 10px;background-color:#6DBE00;border-color:#6DBE00;">退出</button></form></li>
          </ul>
		<?php else: ?>
		  <ul class="nav navbar-nav">
            <li data-service-index="c1" ><a href="__APP__/Index/index" >首页</a></li>
			<?php if($user["user_name"] != null): ?><li data-service-index="c2"><a href="__APP__/Query/index">医保查询</a></li><?php endif; ?>
			<li data-service-index="c4"><a href="__APP__/Notice/index">通知公告</a></li>
            <li data-service-index="c3"><a href="__APP__/News/index">医保新闻</a></li>
			<!-- <li data-service-index="c5"><a href="__APP__/Suggest/index">意见反馈</a></li> -->
			<?php if($user["user_name"] != null): ?><li data-service-index="c6"><a href="__APP__/Setting/index">个人设置</a></li>
				<li><a href="__APP__/Setting/index" style="font-size:12px;width:95px;padding-right:0px;color:#6DBE00">您好! <?php echo ($user["user_org"]); ?></a></li>
				<li><form class="navbar-form navbar-right" role="form" method="post" action="__APP__/Index/logout"><button type="submit" class="btn btn-primary" style="font-size:12px;margin-top:48px;border-radius:0px;padding:0px 10px;background-color:#6DBE00;border-color:#6DBE00">退出</button></form></li><?php endif; ?>
          </ul><?php endif; ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	

        <div class="container">
		<div class="row" style="margin-top:20px;min-height:440px;border-bottom:1px solid;border-color:#6DBE00;padding-bottom:9px;background-image:url(Public/images/suggest.png);background-repeat:no-repeat">
			<div class="col-sm-4 col-sm-offset-6 blog-main" style="margin-top:40px;margin-right:120px">
				 <form role="form" method="post" action="__URL__/submit">
					<input type="text" class="form-control input-regular" id="mailADD" name="mailADD" style="border-radius:0px;height:40px;margin-bottom:10px" placeholder="请留下您的邮箱" required >
					<textarea type="text" class="form-control" name="suggest_content" rows="11" request style="border-radius:0px;margin-bottom:10px" placeholder="请填写您的建议"></textarea>
					<button type="submit" class="btn query-btn" style="width:350px">保存</button> 
				</form>
			</div>
		</div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Public/js/jquery.min.js"></script>
    <script src="Public/js/bootstrap.min.js"></script>
	<link href="Public/css/bootstrap.min.css"> 
	<link href="Public/css/font-awesome.min.css" rel="stylesheet">
	
	<link href="Public/css/summernote.css" rel="stylesheet">
	<script src="Public/js/summernote.min.js"></script>
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Public/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>