(function(a) {
	a.xiu800=a.xiu800||{};
	a.extend(a.xiu800,{
		util:{
			isIE6:function () {
				return a.browser.msie&&"6.0"==a.browser.version?!0:!1;
			},isIOS:function () {
				return /\((iPhone|iPad|iPod)/i.test(navigator.userAgent)
			},trim:function (a) {
				return a.replace(/(^\s*)|(\s*$)/g,"")
			}
		}
	});
    a.fn.extend({
		returntop:function () {
			if(this[0]) {
				var b=this.click(function () {
					a("html, body").animate({
						scrollTop:0
					},500);
					var c=a(window).height()+80+"px";
					b.data("isClick",!0);
					b.css("bottom",c)
				}),c=null;
				a(window).bind("scroll",function () {
					var d=a(document).scrollTop(),e=a(window).height();
					0<d?b.data("isClick")||b.css({
						opacity:1,bottom:"200px"
					}):b.css({
						opacity:0,bottom:"-200px"
					}).data("isClick",!1);
					a.xiu800.util.isIE6()&&(b.hide(),clearTimeout(c),c=
					setTimeout(function () {
						b.show();
						clearTimeout(c)
					},1E3),b.css("top",d+e-125))
				})
			}
		},
		slideOPen:function(){
			if(this){
				var c=this.click(function(){
					var dd=a(this).parent('dt').next('dd');
					if(dd.length>0){
						if(a(this).hasClass('on')){
							a(this).removeClass('on');
							dd.slideUp();
							$.cookie(a(this).attr('id'), 0);
						}else{
							a(this).addClass('on');
							dd.slideDown();
							$.cookie(a(this).attr('id'), null);
						}
					}else{
						return false;
					}
				});
			}
		}
    })
})(jQuery);
$(function(){
	if($("#returnTop")){
		$("#returnTop").returntop();
	}
	
	if($("#category_zyxc")){
		$("#category_zyxc").slideOPen();
	}
	if($("#category_kncn")){
		$("#category_kncn").slideOPen();
	}
	if($("#category_collect_site")){
		$("#category_collect_site").slideOPen();
	}
	if($.cookie("category_kncn") != null){
		//$("#category_kncn").click();
		$("#category_kncn").removeClass('on').parent('dt').next('dd').hide();
	}
	if($.cookie("category_zyxc") != null){
		$("#category_zyxc").removeClass('on').parent('dt').next('dd').hide();
	}
	if($.cookie("category_collect_site") != null){
		$("#category_collect_site").removeClass('on').parent('dt').next('dd').hide();
	}
});