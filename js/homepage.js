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
    		var $this = jQuery(this),$a = $this.find('a'),$overlaylist = $this.find('.tc_gz_div');
    		if (!$this) {
    			alert("error");
    		}
    		$a.hover(function(){
    	        $overlaylist.stop(true, true).slideDown(200);
    		},function(){
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
	function changeTop14(obj){
	    $(obj).click(function(){
	    	//请求服务端返回数据
	        var page = $('#huanyihuan').attr("rel");
	        jQuery.ajax({'url':'/zhubo/top14?page='+page,'cache':false,'success':function(html){
	        	 var al = new Array();
                 al = $(html).find(".topflag");
                 var bt = $(html).find(".topflag_bt");
                 $(".topflag_bt").html(bt.html());
//                 for (var i=1; i <= 14; i++) {
//                 var obj = $('.top14_'+i).clone();
//                     al.push($(obj).html());
//                 };

                 for (var i=1; i <= 14; i++) {
	                 var curObj = $("#top_14").find('.top14_'+i),a = $(curObj).find('a');
	                 var insertHtml = $(al[i-1]).html();
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
                 
                 changeTop14($(".huanyihuan"));
                //$("#top_14").html(html);
                //changeTop14($(".huanyihuan"));
	        }});
	        //alert('OK'+page);
	                 
			return false;
	    });
	}
	changeTop14($(".huanyihuan"));
                  
    //精挑细选切换
    $('.row-fluid .fluid_tag').each(function(){
        var $this = jQuery(this),$a = $this.find('a');
        $a.click(function(){
             var span = $this.find('span')[0];
             var tag = $(span).attr("rel");
             var flag = "";
             switch(tag)
             {
                 case "list1":
                     $(".sanjiao").css({"left":"257px"});
                     break;
                 case "list2":
                     $(".sanjiao").css({"left":"413px"});
                     flag = "22";
                     break;
                 case "list3":
                     $(".sanjiao").css({"left":"567px"});
                     flag = "27";
                     break;
                 case "list4":
                     $(".sanjiao").css({"left":"724px"});
                     flag = "123";
                     break;
                 case "list5":
                     $(".sanjiao").css({"left":"880px"});
                     flag = "122";
                     break;
           	}
            jQuery.ajax({'url':'/zhubo/jingtiaoxixuan?tag='+flag,'cache':false,'success':function(html){
                        $("#jingtiaoxixuan").html(html);
                        imageHover($("#jingtiaoxixuan").find(".category_image_div_big a"));
                        addLoveEvent($("#jingtiaoxixuan").find(".gz_bt"));
                    }});
                 return false;
    	});
    });

	//最佳新人
    jQuery('body').on('click','#yt6',function(){
        jQuery.ajax({'url':'/zhubo/zuijiaxinren?time=7','cache':false,'success':function(html){
			jQuery("#zuijiaxinren").html(html);
			imageHover($("#zuijiaxinren").find(".new_peo_image_big a"));
			addLoveEvent($("#zuijiaxinren").find(".gz_bt"));
			}});
        return false;
	});
    jQuery('body').on('click','#yt7',function(){
		jQuery.ajax({'url':'/zhubo/zuijiaxinren?time=14','cache':false,'success':function(html){
				jQuery("#zuijiaxinren").html(html);
				imageHover($("#zuijiaxinren").find(".new_peo_image_big a"));
				addLoveEvent($("#zuijiaxinren").find(".gz_bt"));
			}});
		return false;});
	jQuery('body').on('click','#yt8',function(){jQuery.ajax({'url':'/zhubo/zuijiaxinren?time=30','cache':false,'success':function(html){
			jQuery("#zuijiaxinren").html(html);
			imageHover($("#zuijiaxinren").find(".new_peo_image_big a"));
			addLoveEvent($("#zuijiaxinren").find(".gz_bt"));
			}});
		return false;});

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
            	// 如果尚未登录，弹出登录窗
            	
                var flag = $(this).attr("rel_g");
                var uid = $(this).attr("uid");
                
                if(!flag || flag==0)
                {
                    //发出请求加关注
                    jQuery.ajax({'url':'/guanzhu/add',data:"id=" + uid,
                   'success':function(msg){
                    	var error = msg.error;
                    	if(error==0)
                        {
                            $(this).attr("class","gz_bt_ok");
                            $(this).attr("title","取消关注");
                            $(this).attr("rel_g","1");    
                        }
                    }});
                }
                else
                {
                    //发出取消关注请求
                    jQuery.ajax({'url':'/guanzhu/del',data:"id=" + uid,
                    'success':function(msg){
                    	var error = msg.error;
                    	if(error==0)
                        {
                            $(this).attr("class","gz_bt");
                	        $(this).attr("title","加入我的关注");
                            $(this).attr("rel_g","0");    
                        }
                    }});
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
    
    function user_login(html, type) {
    	$(".bar_loginout_div").html(html);
        $(".bar_login_div").hide();
        $(".bar_loginout_div").show();
        //此处需要判断是什么类型登录，赋给class不一样
        //微博：$(".bar_loginout_div").addClass("icon_weibo");
        //qq：$(".bar_loginout_div").addClass("icon_qq");
        //人人：$(".bar_loginout_div").addClass("icon_renren");

        if (type == 'qq'){
        	$(".bar_loginout_div").addClass("icon_qq");
        } else if (type == 'weibo'){
        	$(".bar_loginout_div").addClass("icon_weibo");
        } else if (type == 'renren') {
        	$(".bar_loginout_div").addClass("icon_renren");
        }
        
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
    }
    
    function user_logout() {
    	//alert('注销成功');
        var html_clew = '<span class="bar_login_clew">请用以下帐号</span><a class="bar_login_bt">登录:</a>';
        $(".bar_login_lab").html(html_clew);
        $(".bar_login_div").show();
        $(".bar_loginout_div").hide();
        
        // 请求服务器的logout
    	top.location='/site/logout';
    }
    
    // 根据参数选择调用对应的三方登录的logout函数，然后请求服务器的logout
    function logout(source) {
    	if (source=="qq") {
    		QC.Login.signOut();
    		
    	} else if (source == "weibo") {
    		WB2.logout(function(){
    			//callback function
    		});
    	}
    	
    	// 请求服务器的logout
    	top.location='/site/logout';
    }
    
    $(".logout_a").click(function(){
    	logout('qq');
    });
    
    loginEvent();
    function loginEvent()
    {
        //登录点击
        $(".icon_weibo" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            //userlogin();
            wb_login();
        });
        
        $(".icon_qq" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            qq_login();
            //userlogin();
        });
        
        $(".icon_renren" ).click(function() {
            var html = $("#login_content").html();
            loginDiv = dialog(html);
            loginDiv.show();
            userlogin();
        });
    }
    
    QC.Login({}, 
    	function (reqData, opts) {//登录成功
	        //alert("登录成功");
    		// 关闭登录窗口
	        loginDiv.close();
	        if (QC.Login.check()) {
		        QC.Login.getMe(function(openId, accessToken){
					//alert(["当前登录用户的", "openId为："+openId, "accessToken为："+accessToken].join("\n"));
					if(openId){
	                    $.ajax({  
	                        type:"POST",  
	                        url:"/site/ThirdLogin",
	                        async:false,
	                        data:{'openid':openId,'name':reqData.nickname,'source':'qq','login':'only'},  
	                        success: function(msg){
	                             if(msg != ''){
	                            	 //alert(msg);
	                             }
	                        }  
	                     });  
	                }
				});
	        }
	        
	        $(".bar_login_lab").html("<span class='bar_login_clew'>亲，欢迎回来！</span>");
            var html = "<b class='login_b'></b><span class=''>"+reqData.nickname+"，</span><a class='logout_a' href='javascript:QC.Login.signOut()'>退出登录</a>";
            user_login(html,'qq');
	    }, function (opts) {
	        user_logout();
	    }
	);
    
    function qq_login()
    { 	
	    $("#qq_login_btn img").click(function() {
	    	QC.Login.showPopup({
	 		   appId:"101047673",
	 		   //redirectURI:"http://www.meilizhubo.com"
	 		});
	    });
    }
    
    function wb_login()
    { 	
	    $("#wb_login_btn img").click(function() {
	    	loginDiv.close();
	    	WB2.login(
	    		function(){ //callback function 		        
		    		var getUser = function(W, uid) {
		    			// 得到/users/show.json之后的回调函数
		    			var callback = function(result) {
		    				var name = result.name;
		    				// 请求服务器登录
		    				$.ajax({
		    	                type:"POST",  
		    	                url:"site/ThirdLogin",
		    	                async:false,
		                        data:{'openid':uid,'name':name,'source':'sina','login':'only'}, 
		    	                success: function(msg){  
		    	                     if(msg == 'yes'){  
		    	                        	//你的操作 
		    	                     }
		    	                }  
		    	            });
		    				
		    				$(".bar_login_lab").html("<span class='bar_login_clew'>亲，欢迎回来！</span>");
		    	            var html = "<b class='login_b'></b><span class=''>"+name+"，</span><a class='logout_a' href='javascript:WB2.logout();javascript:user_logout();'>退出登录</a>";
		    	            user_login(html,'weibo');
		    			};
		    			
		    			W.parseCMD("/users/show.json", callback, { uid: uid }, { method: 'get' });
		    		}
	    		// 获取用户信息
  		        WB2.anyWhere(function(W) {
  		            W.parseCMD("/account/get_uid.json",
  		            function(r1, s1) {
  		            	// 获取到uid之后，调用上面的getUser进一步获取用户名，并注册或者登录
  		            	getUser(W, r1.uid);
  		            }, 
  		            {}, 
  		            { method: 'get' });
  		        });
        	});
	    });
    }
    
/*	
    function userlogin()
    {
        $(".login_img img").each(function(){
        	$(this).click(function() {
                //跳转去登录？？
        		
        		alert('login success');
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
	function loginout(){
		QC.Login.signOut();
		WB2.logout(function(){
			//callback function
		});
	} */
});