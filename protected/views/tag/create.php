<?php
/* @var $this TagController */
/* @var $model Tag */

$this->breadcrumbs=array(
	'Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tag', 'url'=>array('index')),
	array('label'=>'Manage Tag', 'url'=>array('admin')),
);
?>

<h1>创建一个tag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>