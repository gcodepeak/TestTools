<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
?>

<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/css/yii/detailview/style.css" />

<h1 style="text-align: center">主播详细信息</h1>

<div style="text-align: center;width:70%;margin:0 auto;">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'local_id',
		'url',
		'name',
		'head_img',
		'site_id',
		'level',
		'wealth_level',
		'time_level',
		'sex',
		'region',
		'familys',
		'constellation',
		'age',
		'hots',
		'fans',
		'tags',
		'news_num',
		'news_photo_num',
		'is_live',
		'last_live_time',
		'photos',
	),
)); ?>
</div>
