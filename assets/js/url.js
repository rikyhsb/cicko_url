$(document).ready(function(){
	$("#shorten").click(function(){
		var url = $("#url").val();
		$("#loading").show();
		$.ajax({
			url: "response.php",
			data: "url="+url,
			cache: false,
			success: function(msg){
				$("#short_url").html(msg);
				$("#loading").hide();
				$("#url").val("");	
			}
		});
	});
});