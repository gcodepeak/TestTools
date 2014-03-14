<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="keywords"
	content="美女主播,美女视频,美女直播,秀场,视频聊天,视频交友,美女视频聊天,美女视频直播秀" />
<meta name="description"
	content="meilizhubo 美女主播导航是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。" />
<meta name="robots"
	content="<?php Yii::getPathOfAlias('webroot')?>/robots.txt" />

	<?php
		//Yii::app()->clientScript->scriptMap=array('jquery.js'=>false,);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/jquery.min.js");
		//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/bootstrap.min.js");
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/commend.js");
	?>
<!--[if IE 6]>
	<script src="/js/iepngfix.js" language="javascript" type="text/javascript"></script>
<![endif]-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-47546160-1', 'meilizhubo.com');
	  ga('send', 'pageview');
	
	</script>
	<?php echo $content; ?>
</body>
</html>
