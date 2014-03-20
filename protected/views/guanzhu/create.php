<?php
/* @var $this GuanzhuController */
/* @var $model Guanzhu */

$this->breadcrumbs=array(
	'Guanzhus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Guanzhu', 'url'=>array('index')),
	array('label'=>'Manage Guanzhu', 'url'=>array('admin')),
);
?>

<h1>Create Guanzhu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>