$(document).ready(function() {
	//全选和取消全选
	$("input[name=selectAll]").click(function(){
		if(this.checked) {
			$("input[type=checkbox]").each(function(){
				this.checked = true;
			});
		}else{
			$("input[type=checkbox]").each(function(){
				this.checked = false;
			});
		}
	});

	$("body").css("display","none");
	$("body").fadeIn("slow");
});

/**
 * 检查选择项
 * @return {boolean} 检查结果 
 */
function checkSelect(){
    var num = 0;
    var size = document.all("ids").length;
    if(size > 0) {
        for(i=0; i < size; i++ ) {
            if(document.all("ids").item(i).checked) {
            	num++;
            }
        }
    } else {
        if(document.all("ids").checked ){
        	num = 1;
        }
    }

	if(num == 0){
		alertMsg("所选项为空");
		return false;
	}else if(num == 1){
		alertMsg("批量操作请至少选择两项");
		return false;
	}else{
		return true;
	}
}

/**
 * 父窗口提示信息
 * @param {String} msg 提示信息
 */
function parentAlertMsg(msg){
	window.parent.parent.alertMsg(msg);
}

/**
 * 删除
 * @param {String} url
 */
function deleteRecord(url){
	$("#dialog-confirm" ).dialog({
		resizable: true,
		modal: true,
		title: '提示信息',
		buttons: {
			"确认": function() {
				window.location.href=url;
			},
			"取消": function() {
				$( this ).dialog( "close" );
			}
		}
	});
}