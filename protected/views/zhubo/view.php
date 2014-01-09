<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
?>

<h1>查看主播详细信息</h1>

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
