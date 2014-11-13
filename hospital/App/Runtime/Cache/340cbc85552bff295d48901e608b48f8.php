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
						<a href="__APP__/Query/index" class="list-group-item active">医保查询</a>
						<a href="__APP__/Customer/index" class="list-group-item">用户管理</a>
						<a href="__APP__/Setting/index" class="list-group-item">个人设置</a>
				</div>
			</div>
			<div class="col-md-10" style="height:100%;background-color:#fff;padding-top:30px">
				<form role="form" method="post" action="__URL__/index">
					<div class="row" style="margin-top:25px;margin-left:20px">
					  <div class="col-md-11 col-md-offset-1">
						<p style="font-size:16px">有效查询数据日期范围为:<?php echo ($hospitalCurrent["earliest_date"]); ?>——<?php echo ($hospitalCurrent["latest_date"]); ?></p></br>
					  </div>
					  <div class="col-md-5 col-md-offset-1" style="margin-bottom:15px">
						<div class="input-group">
						  <span class="input-group-btn">
							<button class="btn btn-default input_regular" type="button" disabled="true">患者ID号</button>
						  </span>
						  <input type="text" class="form-control input_regular" id="patient_id" name="patient_id" value="<?php echo ($patient_id); ?>" placeholder="请输入患者ID号">
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-5 -->
					  <div class="col-md-5" style="margin-bottom:15px;margin-left:-15px">
						<div class="input-group">
						  <span class="input-group-btn">
							<button class="btn btn-default input_regular" type="button" disabled="true">患者身份证号</button>
						  </span>
						  <input type="text" class="form-control input_regular" id="id_no" name="id_no" value="<?php echo ($id_no); ?>" placeholder="请输入患者身份证号">
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-5 -->
					  <div class="col-md-5 col-md-offset-1">	
						<div class="input-group">
						  <span class="input-group-btn">
							<button class="btn btn-default input_regular" type="button" disabled="true">入院日期</button>
						  </span>
						  <div class="input-group date form_date col-lg-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" id="datetimepicker">
							<input type="text" class="form-control input input_regular" id="admission_date_time" name="admission_date_time" value="<?php echo ($admission_date_time); ?>" placeholder="请选择入院日期">
							<span class="input-group-addon input_regular"><span class="glyphicon glyphicon-calendar"></span></span>
						  </div>
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					  <div class="col-md-5"  style="margin-bottom:15px;margin-left:-15px">	
						<div class="input-group">
						  <span class="input-group-btn">
							<button class="btn btn-default input_regular" type="button" disabled="true">出院日期</button>
						  </span>
						  <div class="input-group date form_date col-lg-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" id="datetimepicker1">
							<input type="text" class="form-control input input_regular" id="discharge_date_time" name="discharge_date_time" value="<?php echo ($discharge_date_time); ?>" placeholder="请选择出院日期">
							<span class="input-group-addon input_regular"><span class="glyphicon glyphicon-calendar"></span></span>
						  </div>
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					  <div class="col-md-5" style="margin-left:440px">
							<button type="submit" class="btn" style="width:170px;height:40px;border-radius:0px;background-color:#6DBE00;color:#fff">查询</button>
							<button type="submit" class="btn" style="width:170px;height:40px;border-radius:0px;background-color:#FF5A00;color:#fff;margin-left:5px">清除</button>
					  </div>
					</div><!-- /.row -->
					<input type="hidden" id="HOSP_ID" name="HOSP_ID" value="<?php echo ($hospitalCurrent["hosp_id"]); ?>">
					<?php if($chargeList): ?><hr/>
					  <?php if(is_array($chargeList)): $i = 0; $__LIST__ = $chargeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$charge): $mod = ($i % 2 );++$i;?><table class="table table-striped">
						<tr>
							<td colspan="3">ID号</td>
							<td colspan="3"><?php echo ($charge["patient_id"]); ?></td>
							<td colspan="3">住院号</td>
							<td colspan="3"><?php echo ($charge["inp_no"]); ?></td>
						</tr>
						<tr>
							<td colspan="3">姓名</td>
							<td colspan="3"><?php echo ($charge["name"]); ?></td>
							<td colspan="3">身份证号</td>
							<td colspan="3"><?php echo ($charge["id_no"]); ?></td>
						</tr>
						<tr>
							<td colspan="3">入院日期</td>
							<td colspan="3"><?php echo ($charge["admission_date_time"]); ?></td>
							<td colspan="3">出院日期</td>
							<td colspan="3"><?php echo ($charge["discharge_date_time"]); ?></td>
						</tr>
						<tr>
							<td colspan="2" style="font-weight:bold">收费项目</td>
							<td colspan="2" style="font-weight:bold">金额</td>
							<td colspan="2" style="font-weight:bold">收费项目</td>
							<td colspan="2" style="font-weight:bold">金额</td>
							<td colspan="2" style="font-weight:bold">收费项目</td>
							<td colspan="2" style="font-weight:bold">金额</td>
						</tr>
						<tr>
							<td colspan="2">西药费</td>
							<td colspan="2"><?php echo ($charge["xiyf"]); ?></td>
							<td colspan="2">检查费</td>
							<td colspan="2"><?php echo ($charge["jiancf"]); ?></td>
							<td colspan="2">手术费</td>
							<td colspan="2"><?php echo ($charge["shousf"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">中成药</td>
							<td colspan="2"><?php echo ($charge["zhongchyao"]); ?></td>
							<td colspan="2">放射费</td>
							<td colspan="2"><?php echo ($charge["fangsf"]); ?></td>
							<td colspan="2">血费</td>
							<td colspan="2"><?php echo ($charge["xuef"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">中草药</td>
							<td colspan="2"><?php echo ($charge["zhongcy"]); ?></td>
							<td colspan="2">化验费</td>
							<td colspan="2"><?php echo ($charge["huayf"]); ?></td>
							<td colspan="2">护理费</td>
							<td colspan="2"><?php echo ($charge["hulf"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">诊查费</td>
							<td colspan="2"><?php echo ($charge["zhencf"]); ?></td>
							<td colspan="2">治疗费</td>
							<td colspan="2"><?php echo ($charge["zhilf"]); ?></td>
							<td colspan="2">床位费</td>
							<td colspan="2"><?php echo ($charge["chuangwf"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">材料费</td>
							<td colspan="2"><?php echo ($charge["cailf"]); ?></td>
							<td colspan="2">饮食费</td>
							<td colspan="2"><?php echo ($charge["huosf"]); ?></td>
							<td colspan="2">其他</td>
							<td colspan="2"><?php echo ($charge["qit"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">合计</td>
							<td colspan="2"><?php echo ($charge["charges"]); ?></td>
							<td colspan="2">&nbsp</td>
							<td colspan="2">&nbsp</td>
							<td colspan="2">&nbsp</td>
							<td colspan="2">&nbsp</td>
						</tr>
					</table>
					  <hr/><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php else: ?>
						  <hr/>
						  <h4>&nbsp;&nbsp;&nbsp;<?php echo ($warn); ?></h4><?php endif; ?>
				</form>
			</div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Public/js/jquery.min.js"></script>
    <script src="Public/js/bootstrap.min.js"></script>
	<script src="Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="Public/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<link rel="stylesheet" type="text/css" href="Public/css/bootstrap-datetimepicker.css"/ > 
	<script>
		$('#datetimepicker').datetimepicker({
			language:  'zh-CN',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0,
			pickerPosition: "bottom-left",
			format: 'yyyy-mm-dd'
		});
		
		$('#datetimepicker1').datetimepicker({
			language:  'zh-CN',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0,
			pickerPosition: "bottom-left",
			format: 'yyyy-mm-dd'
		});
		
		$(document).ready(function() {
			//清除按钮
			$("#clearButton").click(function(){
				$("#patient_id").val("");
				$("#id_no").val("");
				$("#admission_date_time").val("");
				$("#discharge_date_time").val("");
				
			});
		});
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>