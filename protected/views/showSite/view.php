<?php
/* @var $this ShowSiteController */
/* @var $model ShowSite */

$this->breadcrumbs=array(
	'Show Sites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ShowSite', 'url'=>array('index')),
	array('label'=>'Create ShowSite', 'url'=>array('create')),
	array('label'=>'Update ShowSite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShowSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShowSite', 'url'=>array('admin')),
);
?>

<h1>View ShowSite #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'weight',
	),
)); ?>
