<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="keywords"
	content="美女主播,美女视频,美女直播,秀场,视频聊天,视频交友,美女视频聊天,美女视频直播秀" />
<meta name="description"
	content="秀800美女主播导航是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。" />
<meta name="robots"
	content="<?php Yii::getPathOfAlias('webroot')?>/robots.txt" />

<!-- blueprint CSS framework -->
<!-- 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
-->
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<!-- 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />  
-->

<!-- bootstrapt -->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/nav.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/tooltips.css" />
		
	<?php
		//Yii::app()->clientScript->scriptMap=array('jquery.js'=>false,);
		//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery-1.10.2.min.js");
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/bootstrap.min.js");
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="domain_verify" content="pmrgi33nmfuw4ir2ejwwk2lmnf5gq5lcn4xgg33neiwcez3vnfsceorcgm2gkmrymqzdmnrzgrsdinbwhfqtizrqhaytmnzymrswenzyge2celbcoruw2zktmf3gkir2geztqojyhaytgmbvgizdi7i">

</head>

<script type="text/javascript">
$(document).ready(function(){
	   
    $('.logo').hover(function(){	
	    	$('.logo').find('img:eq(0)').show();
     },function(){
	$('.logo').find('img:eq(0)').hide();
    	
    });
    
    $('.lookUs').hover(function(){	 
    	  $('.lookUs').find('.MOKO_QRcode').show();   	  
    	  return;
    },function(){
    	$('.lookUs').find('.MOKO_QRcode').hide();
    	return;
    	
    });
    
 });
</script>


<script>
		window._bd_share_config={
			"common":{"bdSnsKey":{},"bdText":"快来快来,我发现了一个好网站哦~全是美女,还都直播,实时的哦~~~http://xiu800.cn @秀800 秀800美女主播导航是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},
			share:[{"tag":"share_top","bdSize":16,},{"tag":"share_footer","bdSize":32,"bdStyle":"0"}]
		};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];
</script>

<body>
	<div class="container" id="nav" style="width:100%;background-color: #fefefe;">
		<hr style="height:1px;border:1px solid #ba2c49; background-color:#ba2c49"></hr>
		<div style="width:1214px;margin:0 auto;">
			<div class="row-fluid">
				<div class="span5" style="margin-top:15px">
					<a href="<?php echo Yii::app()->homeUrl?>"><img
						src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"></img></a>
				</div>
	
				<div class="span7">
	
					<div class="row-fluid">
						<div class="span2 offset8" style="font-size:12px;color:#666666;">
							<div style="float: right;padding:8px 1px">美播去哪儿？</div>
						</div>
						<div class="span2">
							<div class="bdsharebuttonbox" data-tag="share_top" style="background-color:#C02747;width:90%;">
								<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
								<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
							</div>
							<!-- div>
								<a href="#" class="lookUS"  hidefocus="true"><img alt="二维码" src="#"></img></a>
							</div-->
							
						</div>
					</div>
	
					<div class="row-fluid">

					<nav class="moko-nav">
						<div class="max-width" style="max-width:600px; position: relative;">
							<ul class="nav-pills" style="margin-left: 150px;">
								<li class="dropdown"><a id="nav_home" href="<?php echo Yii::app()->createUrl('zhubo/homepage');?>" hidefocus="true" 
								<?php if (Yii::app()->controller->id == "zhubo"){echo 'style="color:#ba2c49;"';}?> >主播大厅</a></li>
								<li  class="dropdown disabled"><a id="nav_care" class="tooltips" href="#" hidefocus="true">我的关注<span>即将上线敬请关注</span></a></li>
								<li id="navmenu_fav" class="dropdown">
									<a id="nav_fav" href="javascript:void(0)" hidefocus="true" class="dropdown-toggle tooltips">收录站点<b style="font-size: 10px;">&nbsp▼</b><span>即将上线敬请关注</span></a>
									<!-- ul class="dropdown-menu">
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>" hidefocus="true" >56我秀</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">9158</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">6间房</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">酷狗繁星</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">搜狐秀场</a></li>
									</ul> -->
								</li>
								
								<li  class="dropdown"><a id="nav_contact" href="#" hidefocus="true">联系我们</a></li>
							</ul>
						</div>
					</nav>
					
					<!-- the head of home page -->				
				  	<!-- div class="navbar" style="font-size: 16px;">
				  		<div class="navbar-inner">
				  		<div class="container">
				  		<div class="nav-collapse collapse">
					    	<ul class="nav">
						        <li >
									<a href="<?php echo Yii::app()->createUrl('zhubo/homepage');?>">主播大厅</a></li>
								<li class="disabled">
									<a href="<?php echo Yii::app()->createUrl('')?>">我的关注</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">收藏站点<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">56我秀</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">9158</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">6间房</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">酷狗繁星</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('showsite/index',array('site_id'=>1,))?>">搜狐秀场</a></li>
									</ul></li>
								<li><a href="<?php echo Yii::app()->createUrl('zhubo/homepage');?>">网站合作</a></li>
								<?php if (false && !Yii::app()->user->isGuest) { ?>
									<li><a href="<?php echo Yii::app()->createUrl('zhubo/admin');?>">管理主播</a></li>
									<li><a href="<?php echo Yii::app()->createUrl('site/logout');?>">注销</a></li>
								<?php }; ?>
						    </ul>
						</div>
				    	</div>
				    	</div>
				   </div>  -->
				   </div>
				</div>
			</div>
		</div>
	</div>
	

	<?php echo $content; ?>

	<div id="footer" style="width: 100%;background-color:#F4F4F4;clear:both;">
		<div class="container">
			<div class="row-fluid" style="margin-bottom: 10px; margin-left: 2px">
				<div class="span2">
					<span><strong>友情链接</strong></span>
				</div>
			</div>
			<div class="row-fluid">
				<!-- 友情链接 -->
				<div class="span8">
					<div class="span2">
						<a href="http://mm.56.com/" target="_blank" title="美女主播">美女主播</a>
					</div>
					<div class="span2">
						<a href="http://xiu.56.com/" target="_blank" title="我秀">我秀</a>
					</div>
					<div class="span2">
						<a href="http://www.6.cn/" target="_blank" title="6间房">6间房</a>
					</div>
					<div class="span2">
						<a href="http://x.joy.cn/" target="_blank" title="星秀">星秀</a>
					</div>
					<div class="span2">
						<a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a>
					</div>
					<div class="span2">
						<a class="ftu" href="mailto:sites@xiu800.cn?subject=申请友情链接：贵网站名称"
							target="_blank" title="申请友链">[+申请友链]</a>
					</div>
				</div>

				<!-- 微博&二维码 -->
				<div class="span4" >
					<div class="row-fluid">
						<div class="span6">
							<div class="row-fluid">
								<div class="bdsharebuttonbox" data-tag="share_footer">
									<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
									<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
								</div>			
							</div>
							<div class="row-fluid" style="font-size:12px">
								<p>© 2013-2023<br />
								MEILIZHUBO.COM<br /> 
								ALL RIGHTS RESERVED.<br />
									京ICP备12050577号
								</p>
							</div>
							<div class="row-fluid">
								<img src="<?php echo Yii::app()->baseUrl;?>/images/footer_logo.png"></img>
							</div>		
						</div>
						
						<div class="span6" style="margin-left: -60px; margin-top:-20px">
							<!-- div style="background-image: url(/images/saoyisao.png);background-repeat: no-repeat;background-position: top center;hight:60%;width:60%;">
							</div-->
							<img src="<?php echo Yii::app()->baseUrl;?>/images/saoyisao.png"></img>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
</body>
</html>
