<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="zh_CN" />
<meta name="keywords"
	content="<?php echo CHtml::encode($this->keywords);?>" />
<meta name="description"
	content="<?php echo CHtml::encode($this->description);?>" />
<meta name="robots"
	content="<?php Yii::getPathOfAlias('webroot')?>/robots.txt" />

<link rel="stylesheet" type="text/css" href="/css/homeindex.css" />
<link rel="stylesheet" type="text/css" href="/css/homepage.css" />
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
<script type="text/javascript" src="http://cbjs.baidu.com/js/m.js"></script>
</head>

<body>
<?php include_once(dirname(__FILE__)."/../../components/Analyticstracking.php")?>
	<?php echo $content; ?>
<!-- 百度统计代码 --!>
<!-- script>var _hmt = _hmt || [];(function() {  var hm = document.createElement("script");  hm.src = "//hm.baidu.com/hm.js?dd8b42ae9653d81dc159afb43920d560";  var s = document.getElementsByTagName("script")[0];   s.parentNode.insertBefore(hm, s);})();</script-->
</body>
</html>
