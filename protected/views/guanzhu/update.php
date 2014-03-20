<?php
/* @var $this GuanzhuController */
/* @var $model Guanzhu */

$this->breadcrumbs=array(
	'Guanzhus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guanzhu', 'url'=>array('index')),
	array('label'=>'Create Guanzhu', 'url'=>array('create')),
	array('label'=>'View Guanzhu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guanzhu', 'url'=>array('admin')),
);
?>

<h1>Update Guanzhu <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>