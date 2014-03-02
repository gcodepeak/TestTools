<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropdown.css" />

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/yii/gridview/styles.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/yii/pager.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/yii/detailview/styles.css" />
	
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<div id="header">
			<div id="logo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</div>
		</div>
		<!-- header -->

		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
					'htmlOptions'=>array('id'=>'','class'=>'dropdown dropdown-horizontal'),
					'items'=>array(
							array('label'=>'美丽主播首页', 'url'=>array('zhubo/homepage')),
							array('label'=>'主播管理', 'url'=>array('zhubo/admin')),
							array('label'=>'秀场管理', 'url'=>array('showSite/admin')),
							array('label'=>'TAG管理', 'url'=>array('tag/admin')),
							array('label'=>'主播tag管理', 'url'=>array('zhuboTag/taged')),
							array('label'=>'未标注主播', 'url'=>array('zhuboTag/toTag')),
							array('label'=>'登录', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'注销('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
			)); ?>
		</div>
		<!-- mainmenu -->
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'homeLink'=>CHtml::link('首页',Yii::app()->homeUrl),
				'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy;
			<?php echo date('Y'); ?>
			by MEILIZHUBO. All Rights Reserved.<br />
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
