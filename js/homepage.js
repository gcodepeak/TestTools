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
    
    //最底部链接效果
    $(".zb_form_link").hover(function(){
        var obj = $(this).find("div");
        var objClass = $(obj).attr('class')+"_hover";
        $(obj).attr('class',objClass);
    },function(){
        var obj = $(this).find("div");
        var objClass = $(obj).attr('class').replace("_hover",'');
        $(obj).attr("class",objClass);
    });
        
    //top14展示模块
    function topEvent(obj)
    {
    	$(obj).each(function(){
    		var $this = jQuery(this),$a = $this.find('a'),$overlay=$this.find('.overlay'),$overlaylist = $this.find('.tc_gz_div');
    		if (!$this) {
    			alert("error");
    		}
    		$a.hover(function(){
    			//$overlay.toggle();
    			$overlay.stop(true, true).slideDown(200);
    	        $overlaylist.stop(true, true).slideDown(200);
    		},function(){
    			//$overlay.toggle();
    			$overlay.stop(true, true).slideUp(200);
    	        $overlaylist.stop(true, true).slideUp(200);
    		});
    	});
    }
    topEvent($('li.head_cube'));
    //产生随机数
    function getRandomNum(Min,Max)
    {   
        var Range = Max - Min;   
        var Rand = Math.random();   
        return(Min + Math.round(Rand * Range));   
    } 
    //换一换功能
    $(".huanyihuan").click(function(){
    	//请求服务端返回数据
        //
        var al = new Array();
        for (var i=1; i <= 14; i++) {
            var obj = $('.top14_'+i).clone();
            al.push($(obj).html());
        };
        
    	for (var i=1; i <= 14; i++) {
    	    var curObj = $("#top_14").find('.top14_'+i),a = $(curObj).find('a');
            var insertHtml = al[i-1];
            curObj.append(insertHtml);
            //动画，随机时间
            var time = getRandomNum(1000,1500);
            $(a).animate( { height: 0}, time,'',function(){
                var par = $(this).parent();
                $(this).remove();
                topEvent(par);
                addLoveEvent(par.find(".gz_bt"));
            });
    	}
    });

    //精挑细选切换
    $('.row-fluid .fluid_tag').each(function(){
        var $this = jQuery(this),$a = $this.find('a');
        $a.click(function(){
             var span = $this.find('span')[0];
             var tag = $(span).attr("rel");
             switch(tag)
             {
                 case "list1":
                     $(".sanjiao").css({"left":"257px"});
                     break;
                 case "list2":
                     $(".sanjiao").css({"left":"413px"});
                     break;
                 case "list3":
                     $(".sanjiao").css({"left":"567px"});
                     break;
                 case "list4":
                     $(".sanjiao").css({"left":"724px"});
                     break;
                 case "list5":
                     $(".sanjiao").css({"left":"880px"});
                     break;
           	}
    	});
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
    $(".new_peo_image_big a").mousemove(function(){
        $(this).css("margin","-1px");
        var span = $(this).find("span");
        $(span).addClass("hover_color");
    }); 
    $(".new_peo_image_big a").mouseout(function(){
        $(this).css("margin","0px");
        var span = $(this).find("span");
        $(span).removeClass("hover_color")
    });
    $(".category_image_div_big a").mousemove(function(){
        $(this).css("margin","-1px");
        var span = $(this).find("span");
        $(span).addClass("hover_color");
    }); 
    $(".category_image_div_big a").mouseout(function(){
        $(this).css("margin","0px");
        var span = $(this).find("span");
        $(span).removeClass("hover_color")
    });   
    
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
                var className = $(this).attr("class");
                var uid = $(this).attr("uid");
                
                if(className == "gz_bt")
                {
                    //发出请求加关注
            //        jQuery.ajax({'url':'http://www.meilizhubo.com/xxx',data:"uid=" + uid,
            //       'success':function(msg){
            //        	var error = msg.error;
            //        	if(error==0)
            //            {
                            $(this).attr("class","gz_bt_ok");
                            $(this).attr("title","取消关注");     
            //            }
            //        }});
                }
                else if(className == "gz_bt_ok")
                {
                    //发出取消关注请求
             //       jQuery.ajax({'url':'http://www.meilizhubo.com/xxx',data:"uid=" + uid,
              //      'success':function(msg){
             //       	var error = msg.error;
             //       	if(error==0)
             //           {
                            $(this).attr("class","gz_bt");
                	        $(this).attr("title","加入我的关注");    
             //           }
            //        }});
                }
                return false;
            });
        });
    }
    addLoveEvent($(".gz_bt"));
    
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
    }
});