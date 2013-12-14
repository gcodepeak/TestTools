<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */

$this->breadcrumbs=array(
	'Zhubos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zhubo', 'url'=>array('index')),
	array('label'=>'Manage Zhubo', 'url'=>array('admin')),
);
?>

<h1>Create Zhubo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>