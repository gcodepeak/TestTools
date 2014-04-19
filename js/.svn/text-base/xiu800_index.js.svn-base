function closeSuggestAddToFav(){
	$("#suggestAddToFav").hide();
}
function neverShowSuggestAddToFav(){
	closeSuggestAddToFav();
	$.cookie("showSuggestAddToFav", 0);
}
$(document).ready(function(){
	var showSuggestAddToFav= $.cookie("showSuggestAddToFav");
	if(showSuggestAddToFav == null){
		$("#suggestAddToFav").show();
	}
});