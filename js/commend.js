$(document).ready(function(){
    //bar菜单效果
    $("#navmenu_fav").mousemove(function(e){
        $(this).addClass("bar_sl_mo");
        $(".bar_nav_sitelist").show();
    });
    $(".bar_nav_sitelist").mouseout(function(e){
        var evt = window.event || e;
        var obj = evt.toElement || evt.relatedTarget;
        var pa = this;
        if(pa.contains(obj)) return false;
        $(this).hide();
        $("#navmenu_fav").removeClass("bar_sl_mo");
    });
    $(".bar_nav_fav_menu div").mousemove(function(e){
        $(this).addClass("bar_list_mo");
    });
    $(".bar_nav_fav_menu div").mouseout(function(e){
        $(this).removeClass("bar_list_mo");
    });

    //关注鼠标移上去效果
    $(".gz_bt").each(function(){
    	var className = $(this).attr("class");
    	if(className == "gz_bt")
        {
        	$(this).attr("title","加入我的关注");
        }
        else
        {
     		$(this).attr("title","取消关注");
        }
    });
    //正在播放鼠标移上去效果
    $(".span_icon").each(function(){
    	$(this).attr("title","正在直播");
    });
	//图片鼠标移上去效果
    function imageHover(obj){
		$(obj).each(function(){
			$(this).mouseover(function(){
				var img = $(this).find("img");
				$(img).addClass("imghover");
			});
			$(this).mouseout(function(){
				var img = $(this).find("img");
				$(img).removeClass("imghover");
			});
		});
    }
    imageHover($(".new_peo_image_big a"));
    imageHover($(".category_image_div_big a"));
    
    //回到顶部
    $(document).scroll( function() { 
        var s_top = $(document).scrollTop();
        if (s_top>200) {
            $(".goto_top").show();
        }
        else
        {
            $(".goto_top").hide();  
        }
    }); 
    $(".goto_top").click(function(){
        $('body,html').animate({ scrollTop: 0 }, 300);
    });

    //加关注&&取消关注
    function addLoveEvent(obj){
        $(obj).each(function(){
            $(this).click(function(){
                var flag = $(this).attr("rel_g");
                var uid = $(this).attr("uid");
                
                if(!flag || flag==0)
                {
                    //发出请求加关注
            //        jQuery.ajax({'url':'http://www.meilizhubo.com/xxx',data:"uid=" + uid,
            //       'success':function(msg){
            //        	var error = msg.error;
            //        	if(error==0)
            //            {
                            $(this).attr("class","gz_bt_ok");
                            $(this).attr("title","取消关注");
                            $(this).attr("rel_g","1");    
            //            }
            //        }});
                }
                else
                {
                    //发出取消关注请求
             //       jQuery.ajax({'url':'http://www.meilizhubo.com/xxx',data:"uid=" + uid,
              //      'success':function(msg){
             //       	var error = msg.error;
             //       	if(error==0)
             //           {
                            $(this).attr("class","gz_bt");
                	        $(this).attr("title","加入我的关注");
                            $(this).attr("rel_g","0");     
             //           }
            //        }});
                }
                return false;
            });
            $(this).hover(function(){
                $(this).attr("class","gz_bt_ok");
            },function(){
                var flag = $(this).attr("rel_g");
                if (!flag || flag==0) {
                    $(this).attr("class","gz_bt"); 
                }
            });
        });
    }
    addLoveEvent($(".gz_bt"));
    
    /*
    //登录hover
    var loginDiv;
    $(".icon_weibo").hover(function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).addClass("icon_login_hover");
        $(span).addClass("spanhover");
    },function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).removeClass("icon_login_hover");
        $(span).removeClass("spanhover");
    });
    $(".icon_qq").hover(function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).addClass("icon_login_hover");
        $(span).addClass("spanhover");
    },function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).removeClass("icon_login_hover");
        $(span).removeClass("spanhover");
    });
    $(".icon_renren").hover(function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).addClass("icon_login_hover");
        $(span).addClass("spanhover");
    },function(){
        var b = $(this).find("b");
        var span = $(this).find("span");
        $(b).removeClass("icon_login_hover");
        $(span).removeClass("spanhover");
    });
    loginEvent();
    function loginEvent()
    {
        //登录点击
        $(".icon_weibo" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            userlogin();
        });
        $(".icon_qq" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            userlogin();
        });
        $(".icon_renren" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            userlogin();
        });
    }
    function userlogin()
    {
        $(".login_img img").each(function(){
        	$(this).click(function() {
                //跳转去登录？？
                
                //登录成功后修改右上角
                loginDiv.close();
                $(".bar_login_lab").html("<span class='bar_login_clew'>亲，欢迎回来！</span>");
                var html = "<b class='login_b'></b><span class=''>李开复XX，</span><a class='logout_a' href='#'>退出登录</a>";
                $(".bar_loginout_div").html(html);
                $(".bar_login_div").hide();
                $(".bar_loginout_div").show();
                //此处需要判断是什么类型登录，赋给class不一样
                //微博：$(".bar_loginout_div").addClass("icon_weibo");
                //qq：$(".bar_loginout_div").addClass("icon_qq");
                //人人：$(".bar_loginout_div").addClass("icon_renren");
                $(".bar_loginout_div").addClass("icon_qq");
                $(".bar_loginout_div" ).hover(function(){
                    var b = $(this).find("b");
                    var span = $(this).find("span");
                    var a = $(this).find("a");
                    $(b).addClass("icon_login_hover ");
                    $(span).addClass("spanhover");
                    $(a).addClass("a_hover");
                },function(){
                    var b = $(this).find("b");
                    var span = $(this).find("span");
                    var a = $(this).find("a");
                    $(b).removeClass("icon_login_hover");
                    $(span).removeClass("spanhover");
                    $(a).removeClass("a_hover");
                });
                $(".logout_a" ).click(function(){
                    var html_clew = '<span class="bar_login_clew">请用以下帐号</span><a class="bar_login_bt">登录:</a>';
                    $(".bar_login_lab").html(html_clew);
                    $(".bar_login_div").show();
                    $(".bar_loginout_div").hide();
                });
                
            });
        });    
    }*/
});