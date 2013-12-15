var bar = 0;
var line = "||";
var amount = "||";
count();
function count(){
	bar = bar + 2;
	amount = amount + line;
	document.loading.chart.value = amount;
	document.loading.percent.value = bar + "%";
	if (bar < 99){
		setTimeout("count()",100);
	}else {
		window.location = "${base}toIndex.jsp";
	}
}