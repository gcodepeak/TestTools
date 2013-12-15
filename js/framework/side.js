$(document).ready(function() {
	$("#openadd").click(function(){
		$("div#addpanel").slideDown("slow");
	});	
	$("#opensearch").click(function(){
		$("div#searchpanel").slideDown("slow");
	});	
	
	$("#closeadd").click(function(){
		$("div#addpanel").slideUp("slow");	
	});
	$("#closesearch").click(function(){
		$("div#searchpanel").slideUp("slow");	
	});	
	
	$("#toggleadd a").click(function () {
		$("#toggleadd a").toggle();
	});	
	$("#togglesearch a").click(function () {
		$("#togglesearch a").toggle();
	});
});