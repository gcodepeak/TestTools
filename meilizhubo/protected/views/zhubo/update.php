<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */

$this->breadcrumbs=array(
	'Zhubos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zhubo', 'url'=>array('index')),
	array('label'=>'Create Zhubo', 'url'=>array('create')),
	array('label'=>'View Zhubo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Zhubo', 'url'=>array('admin')),
);
?>

<h1>Update Zhubo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>