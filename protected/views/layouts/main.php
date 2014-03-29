<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="zh_CN" />
<meta name="keywords"
	content="<?php echo CHtml::encode($this->keywords);?>" />
<meta name="description"
	content="<?php echo CHtml::encode($this->description);?>" />
<meta name="robots"
	content="content="noindex,nofollow"" />

<link rel="stylesheet" type="text/css" href="/css/nav.css" />
<link rel="stylesheet" type="text/css" href="/css/homeindex.css" />
<link rel="stylesheet" type="text/css" href="/css/homepage.css" />
		
<?php
	//Yii::app()->clientScript->scriptMap=array('jquery.js'=>false,);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.min.js");
	//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/bootstrap.min.js");
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/login.js");
?>

<!--[if IE 6]>
<script src="/js/iepngfix.js" language="javascript" type="text/javascript"></script>
<![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle);?></title>
    <meta name="domain_verify" content="pmrgi33nmfuw4ir2ejwwk2lmnf5gq5lcn4xgg33neiwcez3vnfsceorcgm2gkmrymqzdmnrzgrsdinbwhfqtizrqhaytmnzymrswenzyge2celbcoruw2zktmf3gkir2geztqojyhaytgmbvgizdi7i">
	<meta property="qc:admins" content="2566260732655141205276375" />
	<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" 
		data-appid="101047673" data-redirecturi="http://www.meilizhubo.com" data-callback="true" charset="utf-8"></script>
	
	<meta property="wb:webmaster" content="6fde5ee71fe33f5e" />
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=3208590814" type="text/javascript" charset="utf-8"></script>
</head>

<script>
		window._bd_share_config={
			"common":{"bdSnsKey":{},"bdText":"快来快来,我发现了一个好网站哦~全是美女,还都直播,实时的哦~~~http://www.meilizhubo.com @美丽主播 美丽主播美女主播导航是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},
			share:[{"tag":"share_top","bdSize":16,},{"tag":"share_footer","bdSize":32,"bdStyle":"0"}]
		};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];
</script>

<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47546160-1', 'meilizhubo.com');
  ga('send', 'pageview');

</script>

<div class="clearfix" style="width:100%;background-color: #fefefe;">
	<div class="topbar_bg"></div>
	<!-- hr style="height:5px; background-color:#ba2c49;border: 0;"></hr-->
	<div style="width:1190px;margin:0 auto;" class="clearfix">
		<div class="bar_left">
			<div class="bar_icon_div">
				<a href="<?php echo Yii::app()->homeUrl?>"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"></img></a>
			</div>
		</div>
		<div class="bar_right">
			<div class="clearfix">
				<div class="bar_login_lab">
					<span class="bar_login_clew">请用以下帐号</span><a class="bar_login_bt">登录</a>
					<span class="bar_login_clew">:</span>
				</div>
				<div class="bar_login">
					<div class="bar_login_div">
						<a title="用新浪微博账号登录" href="#" class="icon_weibo" data-cmd="tsina"><b></b><span>微博</span></a>
						<a title="用QQ号登录" href="#" class="icon_qq" data-cmd="tqq"><b></b><span>QQ</span></a>
						<a title="用人人账号登录" href="#" class="icon_renren" data-cmd="tqq"><b></b><span>人人</span></a>
					</div>
					<div class="bar_loginout_div"></div>
				</div>
			</div>
			<div>
				<ul class="bar_nav">
					<li class="dropdown bar_home"><a id="nav_home" href="<?php echo Yii::app()->request->baseUrl;?>/zhubo/homepage" hidefocus="true"
					style="color:#ba2c49;" >主播大厅</a></li>
						<li class="dropdown bar_gz disabled"><a id="nav_care" class="tooltips" href="<?php echo Yii::app()->createUrl("guanzhu");?>" >我的关注</a></li>
						<li id="navmenu_fav" class="dropdown bar_sl">
							<a id="nav_fav" href="javascript:void(0)" hidefocus="true" class="dropdown-toggle tooltips">收录站点<b></b></a>
						</li>
                        <li class="dropdown bar_rank"><a id="nav_contact" href="/topList" hidefocus="true">排行榜</a></li>
						<li class="dropdown"><a id="nav_contact" href="/site/contact" hidefocus="true">网站合作</a></li>
                    </ul>
                 </div>
                        <div class="bar_nav_sitelist">
                        <div class="bar_nav_span"></div>
                        <div class="bar_nav_fav_menu">
                            <div class="bar_nav_fav_menu1"><a href="/xiuchang/index?site=1">我秀</a></div>
                            <div><a href="/xiuchang/index?site=2">YY</a></div>
                            <!-- div><a href="/xiuchang/index?site=3">酷我</a></div-->
                            <div><a href="/xiuchang/index?site=4">六间房</a></div>
                        </div>
				</div>
			</div>
		</div>
	</div>
	
<?php echo $content; ?>
	
<!-- footer -->
<!-- 友情连接 -->
<div id="footer" class="clearfix">
    <div class="footer_par clearfix">
        <div class="footer_left">
            <p class="footer_left_link_title"><strong>友情链接</strong></p>
            <div class="footer_link_div">
	            <ul class="clearfix">
	                <li><a href="http://mm.56.com/" target="_blank" title="美女主播">美女主播</a></li>
	                <li><a href="http://xiu.56.com/" target="_blank" title="我秀">我秀</a></li>
	                <li><a href="http://www.6.cn/" target="_blank" title="6间房">6间房</a></li>
	                <li><a href="http://x.joy.cn/" target="_blank" title="星秀">星秀</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	             	<li><a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a></li>
	                <li><a class="ftu" href="mailto:sites@meilizhubo.com?subject=申请友情链接：贵网站名称" target="_blank" title="申请友链">[+申请友链]</a></li>
	            </ul>
	        </div>
            </table>
        </div>
        
        <div class="footer_right clearfix">
            <div class="footer_con_cpu">
            	<div class="bdsharebuttonbox bdshare-button-style0-32 footer_share" data-tag="share_footer" data-bd-bind="1393773940056">
	                <a title="在新浪微博关注我" href="#" class="bds_tsina new_sina_icon" style="background-position: -1px -103px;" data-cmd="tsina"></a>
	                <a title="在腾讯微博关注我" href="#" class="bds_tqq new_qq_icon" style="background-position: -35px -273px;" data-cmd="tqq"></a>
	            </div>
	            <div class="row-fluid footer_cup">
	                <p>© 2013-2023 MEILIZHUBO.COM</p>
	                <p class="cup_2">ALL RIGHTS RESERVED.</p>
	                <p class="cup_3">京ICP备12050577号</p>
	            </div>
	        	<div class="footer_cup_icon">
	            	<img src="/images/footer_logo.png">
	         	</div>
            </div>
         	<div class="footer_image_saomiao" title="扫一扫，关注我的官方微博">
	        </div>
    	</div>
    </div>
</div>

<div id="login_div" style="display:none;">
	<div id="login_content">
			
		<div class="login_img" id="wb_connect_btn">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/images/login_weibo.png" alt="">
		</div>
		<div class="login_img"  id="qq_login_btn">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/images/login_qq.png" alt="">
		</div>
		<div class="login_img" id="renren_login_btn">
			<img src="<?php echo Yii::app()->request->baseUrl;?>/images/login_renren.png" alt="">
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery('body').on('click','#yt0',function(){
	return false;
});
</script>
<?php 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/homepage.js");
?>
<!-- footer -->

</body>
</html>
