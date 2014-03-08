<?php
/* @var $this ZhiboController */
?>
<script>
	window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89343201.js?cdnversion='+~(-new Date()/36e5)];
</script>

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/zhubo_new.css" />

<div class="zb_left_per clearfix">
	<div class="zb_left_sdiv">
		<div class="zb_left clearfix">
			<div class="zb_left_titlediv">
				<span class="goto_homepage"><a
					href="<?php echo Yii::app()->createUrl('zhubo/homepage')?>">大厅</a><b></b></span>
			</div>
			<!-- 当前主播信息 -->
			<div class="zb_info">
				<div>
					<span class="zb_uname"><?php echo $zhubo->name;?></span>
					<div class="zb_gz_bt gz_info" rel="1" uid="1234">
						<span><?php echo $zhubo->hots;?></span>
					</div>
				</div>
				<div class="bdsharebuttonbox">
					<b></b><a href="#" class="bds_qzone" data-cmd="qzone"
						title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina"
						title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq"
						title="分享到腾讯微博"></a><a href="#" class="bds_renren"
						data-cmd="renren" title="分享到人人网"></a>
				</div>
			</div>

			<!-- 换一换主播 -->
			<div class="zb_change clearfix" id='random'>
				<?php	
					$this->renderPartial("_zhubo",
						array('dataProvider'=>$dataProvider));
				?>

				<!-- 换一换按钮 -->
				<div class="zb_change_bt">
					<b class="zb_change_peo"></b> <b class="zb_gohome"><a href="#"></a></b>
				</div>
			</div>

			<!-- 广告 -->
			<div class="zb_ad">
				<script type="text/javascript">
			            var sogou_ad_id=109874;
			            var sogou_ad_height=150;
			            var sogou_ad_width=180;
			         </script>
				<script language='JavaScript' type='text/javascript'
					src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
			</div>

			<!-- 收缩按钮 -->
			<div class="zb_ss_bt">
				<b id="zb_ss_b"></b>
			</div>
		</div>
	</div>
	<!-- 右边 -->
	<div class="zb_right">
		<iframe id="zhibo_iframe" name="_zhibo_target"
			src="<?php echo $zhubo->url;?>"
			style="width: 100%; min-height: 700px; height: 700px; border: 0px solid #fff;"></iframe>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#zb_ss_b").click(function(){
		var left = $(".zb_left_sdiv").offset().left;
		if (left < 0) {
			$(".zb_left_sdiv").animate( { left: 0}, 500 );
			$(".zb_right").animate( { marginLeft: 195}, 500 );
		}
		else
		{
			$(".zb_left_sdiv").animate( { left: -185}, 500 );
			$(".zb_right").animate( { marginLeft: 0}, 500 );
		}
	});
	$(".new_peo_image_big a").mousemove(function(){
        $(this).css("margin","-1px");
    }); 
    $(".new_peo_image_big a").mouseout(function(){
        $(this).css("margin","0px");
    });
    $(".zb_change_peo").mousemove(function(){
        $(this).addClass("zb_change_peo_hover");
    }); 
    $(".zb_change_peo").mouseout(function(){
        $(this).removeClass("zb_change_peo_hover");
    });
    $(".zb_gohome").mousemove(function(){
        $(this).addClass("zb_gohome_hover");
    }); 
    $(".zb_gohome").mouseout(function(){
        $(this).removeClass("zb_gohome_hover");
    });
    //关注hover 效果
    $(".zb_gz_bt").mousemove(function(){
        var rel = $(this).attr("rel");
        if(rel!=1)
        {
            $(this).addClass("no_gz_hover");
        }
        else
        {
            $(this).addClass("gz_hover");
        }
    });
    $(".zb_gz_bt").mouseout(function(){
        var rel = $(this).attr("rel");
        if(rel!=1)
        {
            $(this).removeClass("no_gz_hover");
        }
        else
        {
            $(this).removeClass("gz_hover");
        }
    });
    //关注按钮
    $(".zb_gz_bt").click(function(){
        var rel = $(this).attr("rel");
        var uid = $(this).attr("uid");
        if(rel!=1)
        {
            //
            $(this).removeClass("no_gz_hover");
            $(this).removeClass("gz_info");
            
            $(this).attr("rel","1");
            $(this).addClass("gz_info");
            var span = $(this).find('span');
            var num = parseInt($(span).html());
            $(span).html(num+1);
        }
        else
        {
            $(this).removeClass("gz_hover");
            $(this).removeClass("no_gz_hover");
            //如果请求网络成功
            $(this).attr("rel","0");
            $(this).removeClass("gz_info");
        }
    });
    
    //加关注&&取消关注
    $(".gz_bt").click(function(){
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
        	        $(this).attr("title","加入关注");    
     //           }
    //        }});
        }
        return false;
    });
    
    //换一组
    $(".zb_change_peo").click(function(){
    
    });
    //
});
</script>