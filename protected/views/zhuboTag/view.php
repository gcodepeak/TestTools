<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */

$this->breadcrumbs=array(
	'Zhubo Tags'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ZhuboTag', 'url'=>array('index')),
	array('label'=>'Create ZhuboTag', 'url'=>array('create')),
	array('label'=>'Update ZhuboTag', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ZhuboTag', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ZhuboTag', 'url'=>array('admin')),
);
?>

<h1>View ZhuboTag #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tag_id',
		'zhubo_id',
		'user_id',
		'tag_time',
	),
)); ?>
