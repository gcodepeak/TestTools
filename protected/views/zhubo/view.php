<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */

$this->breadcrumbs=array(
	'Zhubos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Zhubo', 'url'=>array('index')),
	array('label'=>'Create Zhubo', 'url'=>array('create')),
	array('label'=>'Update Zhubo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Zhubo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zhubo', 'url'=>array('admin')),
);
?>

<h1>查看主播详细信息： 编号 #<?php echo $model->id; ?></h1>

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
