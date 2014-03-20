<?php
/* @var $this GuanzhuController */
/* @var $model Guanzhu */

$this->breadcrumbs=array(
	'Guanzhus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Guanzhu', 'url'=>array('index')),
	array('label'=>'Create Guanzhu', 'url'=>array('create')),
	array('label'=>'Update Guanzhu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Guanzhu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guanzhu', 'url'=>array('admin')),
);
?>

<h1>View Guanzhu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'zhubo_id',
		'add_time',
		'del_time',
		'status',
	),
)); ?>
