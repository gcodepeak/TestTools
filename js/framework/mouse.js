$(document).ready(function() {
	//高亮鼠标划过表格行
	$(".dataarea tr").mouseover(function(){
		$(this).css("background", "#B9DBE2");
	});
	$(".dataarea tr").mouseout(function(){
		$(this).css("background", "#FFFFFF");
		trOddChangeColor();
	});
	
	trOddChangeColor();
});

/**
 * 隔行换色
 */
function trOddChangeColor(){
	$("tr:odd").css("background-color", "#f1f1f1");
}