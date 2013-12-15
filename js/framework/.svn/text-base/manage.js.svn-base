//页面加载完成运行
$(document).ready(function() {
	//显示时钟
	showClock();
});

//显示时钟
function showClock() {
	var today = new Date();
	var timeStr = today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getUTCDate() + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	$("#clock").html(timeStr);
	setTimeout("showClock()", 1000);
}
