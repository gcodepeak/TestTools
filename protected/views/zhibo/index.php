<?php
/* @var $this ZhiboController */
?>
<script>
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89343201.js?cdnversion='+~(-new Date()/36e5)];
</script>

<script> 
function show_Favorite(sURL, sTitle){   
	sURL = encodeURI(sURL);
	try{window.external.addFavorite(sURL, sTitle);
	} catch(e) {
		try{window.sidebar.addPanel(sTitle, sURL, "");
		}catch (e) {
			alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
		}
	}
}

function showList(id,num){
	if(num==1){document.getElementById(id).style.display="block"}
	else{document.getElementById(id).style.display="none"}
}
function show_index(url){
    if (document.all) {
        document.body.style.behavior='url(#default#homepage)';document.body.setHomePage(url);
    } else {
        alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!");}
}
</script>

<div style="width:195px;float:left;">
	<div style="background-color: #BA2C49;">

			<a href="<?php echo Yii::app()->createUrl('zhubo/homepage')?>"><img style="width: 100px; height: 30px;"
			src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"></img></a>

			<span style="padding:5px 5px;float:right;">
				<a href="javascript:void(0);" style="color:#fff;" onclick="show_Favorite(window.location,document.title);">+收藏</a>
			</span>

	</div>
		
	<!-- 当前主播信息 -->
	<div class="row" style="margin-left: 15px;">
		<div class="row" style="margin-left: 0px;margin-top:10px;margin-bottom:10px;">
			<span style="color:#F35777;font-size:16px"><strong><?php echo $zhubo->name;?></strong></span>
		</div>
		<div class="row" style="margin-left: 0px;margin-top:5px;margin-bottom:5px;">
			<span style="color: #999;">网站来源&nbsp/&nbsp</span><span style="color:#F35777"><?php echo $zhubo->showSite->name;?> </span>
		</div>
		<div class="row" style="margin-left: 0px;margin-top:5px;margin-bottom:5px;color: #999;font-size:12px">开播时间&nbsp/&nbsp <span style="color:#666">00:00</span></div>
		<div class="row" style="margin-left: 0px;margin-top:5px;margin-bottom:5px;color: #999;font-size:12px">观众人数&nbsp/&nbsp <span style="color:#666"><?php echo $zhubo->hots;?></span></div>
		<div class="row" style="margin-left: 0px;margin-top:5px;margin-bottom:5px;color: #999;font-size:12px">喜欢就分享到:</div>
		<div class="bdsharebuttonbox" style="margin-left: 0px;">
			<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
			<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
			<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		</div>
		<div class="row" style="margin-left: 0px;margin-top:15px;margin-bottom:5px;color: #999;font-size:12px">换一换看看</span>
			<?php 	if (!Yii::app()->user->isGuest) { 
						echo "<a href=".$this->createUrl("/zhubo/update",array('id'=>$zhubo->id)).">更新主播</a>";									
						echo "&nbsp|&nbsp";
						echo "<a href=".$this->createUrl("/zhuboTag/doTag",array('zhubo_id'=>$zhubo->id)).">打tag</a>";
					}
			?>
		</div>
	</div>
		
	<!-- 换一换主播 -->				
	<div class="row" id='random' style="margin-left: 15px;margin-top: 5px;">
        <?php	
			$this->renderPartial("_zhubo",
				array('dataProvider'=>$dataProvider));
		?>
    </div>
		
	<!-- 广告 -->
	<div class="row" style="border: 1px solid;width:180px;height:150px;margin-left:6px">
		<script type="text/javascript">
			var sogou_ad_id=109874;
			var sogou_ad_height=150;
			var sogou_ad_width=180;
		</script>
		<script language='JavaScript' type='text/javascript' src='http://images.sohu.com/cs/jsfile/js/c.js'></script>
	</div>
</div>
	
<div style="margin-left:196px;">
	<iframe id="zhibo_iframe" name="_zhibo_target" src="<?php echo $zhubo->url;?>" 
		style="width:100%;min-height:700px;height: 700px;border:0px solid #fff;">
		
	</iframe>
</div>

<div style="clear: both;"></div>