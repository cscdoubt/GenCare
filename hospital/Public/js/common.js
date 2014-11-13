//打印
$("#print").click(function(){
    $("#frmMain").printArea();
});
//日期选择
$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		pickerPosition: "bottom-left"
});

//上传数据
$("#save").click(function(e){
	$("#frmMain").attr("action",URL+"/submit");
	$("#frmMain").submit();
	$("#frmMain").reset();
	
});

//类别
$("#CATEGORY").ready(function(){
    $.get(APP+"/Index/CategoryList",function(data,status){
		var defaultID = $("#DEFAULT_CATEGORY").val();
        var objs = eval(data);
		if(objs){
	        var content = "<option> </option>";
	        for(var i = 0;i < objs.length;i ++){
				if(objs[i]['ID']==defaultID){
					content += "<option value='"+objs[i]['ID']+"' selected>"+objs[i]['CATEGORY']+"</option>";
				}else{
					content += "<option value='"+objs[i]['ID']+"'>"+objs[i]['CATEGORY']+"</option>";
				}
	           
	        }
	        $("#CATEGORY").append(content);
		}
        
    });
});