$(document).ready(function() {
   $("#menu-code-index").ready(function(){
				  var idx = $("#menu-code-index").val();
				  	$('li[data-service-index="' + idx + '"]').addClass("active");
			  });
});