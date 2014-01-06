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
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/homepage.css" />
	
	<?php
		//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery-1.10.2.min.js");
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/bootstrap.min.js");
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<script>
		window._bd_share_config={
			"common":{"bdSnsKey":{},"bdText":"快来快来,我发现了一个好网站哦~全是美女,还都直播,实时的哦~~~http://xiu800.cn @秀800 秀800美女主播导航是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},
			"share":{}
		};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];
</script>

<body>

	<div class="container" id="page">
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo Yii::app()->homeUrl?>"><img
					src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"></img></a>
			</div>

			<div class="col-md-6">

				<div class="row">
					<div class="col-md-4">.</div>
					<div class="col-md-3" style="margin: 5px; align ='float: right'">美播去哪儿？</div>
					<div class="col-md-3">
						<div class="bdsharebuttonbox" style="align: left">
							<!-- a href="#" class="bds_more" data-cmd="more"></a-->
							<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
							<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
						</div>
					</div>
				</div>

				<div id="content"></div>
				<!-- the head of home page -->
				<ul class="nav nav-tabs nav-justified" role="navigation">
					<!-- pull-right -->
					<li class="active"><a data-toggle="tab"
						href="<?php echo Yii::app()->createUrl('zhubo/homepage')?> "
						>主播大厅</a></li>
					<li class="disabled"><a data-toggle="tab"
						href="<?php echo Yii::app()->createUrl('')?>">我的关注</a></li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#">收藏站点<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo Yii::app()->createUrl('zhubo/show')?>">56我秀</a></li>
							<li><a href="<?php echo Yii::app()->createUrl('zhubo/show')?>">9158</a></li>
							<li><a href="<?php echo Yii::app()->createUrl('zhubo/show')?>">6间房</a></li>
							<li><a href="<?php echo Yii::app()->createUrl('zhubo/show')?>">酷狗繁星</a></li>
							<li><a href="<?php echo Yii::app()->createUrl('zhubo/show')?>">搜狐秀场</a></li>
						</ul></li>
					<li><a data-toggle="tab"
						href="<?php echo Yii::app()->createUrl('zhubo/index');?>"
						data-toggle="tab">网站合作</a></li>
					<li><a data-toggle="tab"
						href="<?php echo Yii::app()->createUrl('zhubo/admin');?>"
						>管理主播</a></li>
				</ul>
			</div>
		</div>

	<?php echo $content; ?>

	<div class="clear"></div>

		<div id="footer">
			<div class="container">
				<div class="row" style="margin-bottom: 10px; margin-left: 2px">
					<div class="col-md-2">
						<span><strong>友情链接</strong></span>
					</div>
				</div>
				<div class="row">
					<!-- 友情链接 -->
					<div class="col-md-8">
						<div class="col-md-2">
							<a href="http://mm.56.com/" target="_blank" title="美女主播">美女主播</a>
						</div>
						<div class="col-md-2">
							<a href="http://xiu.56.com/" target="_blank" title="我秀">我秀</a>
						</div>
						<div class="col-md-2">
							<a href="http://www.6.cn/" target="_blank" title="6间房">6间房</a>
						</div>
						<div class="col-md-2">
							<a href="http://x.joy.cn/" target="_blank" title="星秀">星秀</a>
						</div>
						<div class="col-md-2">
							<a href="http://fanxing.kugou.com/" target="_blank" title="酷狗繁星">酷狗繁星</a>
						</div>
						<div class="col-md-2">
							<a class="ftu" href="mailto:sites@xiu800.cn?subject=申请友情链接：贵网站名称"
								target="_blank" title="申请友链">[+申请友链]</a>
						</div>
					</div>

					<!-- 微博&二维码 -->
					<div class="col-md-4">
						<div class="t-copy">
							<div class="t-share">
								<a href="http://weibo.com/xiu800" target="_blank"><img
									class="i-sinawb" src="/images/transparent.gif" alt="新浪微博" /></a>
								<a href="http://t.qq.com/xiu800" target="_blank"><img
									class="i-txwb" src="/images/transparent.gif" alt="腾讯微博" /></a>
							</div>
							<p>
								© 2012-2021 meilizhubo.CN<br /> All rights reserved. <br />
								京ICP备12050577号
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
