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
	

    <div class="container" style="margin-top:26px;padding-left:0px;height:600px">
				
			<div class="col-md-2" id="sidebar" role="navigation" style="background-color:#F1F1F1;padding:0px;height:100%">
				<div class="list-group">
						<a href="__APP__/Import/index" class="list-group-item">数据导入</a>
						<a href="__APP__/Query/index" class="list-group-item">医保查询</a>
						<a href="__APP__/Customer/index" class="list-group-item active">用户管理</a>
						<a href="__APP__/Setting/index" class="list-group-item">个人设置</a>
				</div>
			</div>
			<div class="col-md-10" style="height:100%;background-color:#fff;padding-top:30px">
					<div class="row">
						<form name="frmMain" id="frmMain" class="form-horizontal" role="form" method="post" action="__URL__/index">
							<div class="form-group" id="checkID">
									<div class="col-md-4">
										  <input type="text" class="form-control input" id="user_name" name="user_name" value="<?php echo ($user_name); ?>" placeholder="请填写用户名" style="border-radius:0px;height:40px">
									</div>
									<div class="col-md-4">
										  <input type="text" class="form-control input" id="user_org" name="user_org" value="<?php echo ($user_org); ?>" placeholder="请填写单位" style="border-radius:0px;height:40px;margin-left:-20px">
									</div>
									<div class="col-md-2">
											<button name="queryTodo" id="queryTodo" class="btn grn-btn" type="submit" style="height:40px;border-radius:0px;width:150px;font-size:16px;margin-left:-40px">筛选</button>
									</div>
									<div class="col-md-2">
											<a type="button" class="btn red-btn" href="__APP__/Customer/customer_add" style="height:40px;border-radius:0px;width:150px;font-size:16px;margin-left:-40px;padding-top:9px">添加用户</a>
									</div>
							</div>
						</form>
						<div class="table-responsive b1" style="padding-left:20px;padding-right:30px">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>用户名</th>
										<th>单位</th>
										<th>电话</th>
										<th>职务</th>
									</tr>
								</thead>
								<tbody id="Customer_container">
									
								</tbody>
							</table>
						</div>
						<input id = "count" type="hidden" value="<?php echo ($count); ?>" />
						<div class="col-md-12 text-center" id="page"></div>
					</div>
		</div>		
    </div> <!-- /container -->
		
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!--Load JS-->
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
	<script src="Public/js/mypage.js"></script>

	<script>
	var totalcount =$("#count").val();
	$(document).ready(function(){
		var post_data = "user_name=" + $("#user_name").val();
		post_data += "&user_org=" + $("#user_org").val();
	  	$.post("__URL__/customerList",post_data,
	  	function(data,status){
			var objs = eval("("+data+")");
			objs = objs['result'];
			var content="";
			for(var i = 0; objs != null && i < objs.length;i ++){
				content += "<tr><td>"+objs[i]['user_name']+"</td><td>"+objs[i]['user_org']+"</td><td>"+objs[i]['office_phone']+"</td><td>"+objs[i]['user_duty']+"</td></tr>";
			}
			$("#Customer_container").empty().append(content);
	  	});
		$.mypage("page",1,totalcount,function(page){
	    	updatePage(page);
	 	});
		updatePage(1);
	 });
     function updatePage(now){
         $.mypage("page",now,totalcount,function(page){
			post_data = "page="+page;
			post_data += "&user_name=" + $("#user_name").val();
			post_data += "&user_org=" + $("#user_org").val();
	 	  	$.post(URL+"/customerList",post_data,
	 	  	function(data,status){
	 			var objs = eval("("+data+")");
				objs = objs['result'];
				var content="";
				for(var i = 0; objs != null && i < objs.length;i ++){
					content += "<tr><td>"+objs[i]['user_name']+"</td><td>"+objs[i]['user_org']+"</td><td>"+objs[i]['office_phone']+"</td><td>"+objs[i]['user_duty']+"</td></tr>";
				}
				$("#Customer_container").empty().append(content);
	 	  	});
           updatePage(page);
         });
     }
	</script>
  </body>
</html>