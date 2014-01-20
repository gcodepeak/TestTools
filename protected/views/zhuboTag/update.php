<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */

$this->breadcrumbs=array(
	'Zhubo Tags'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ZhuboTag', 'url'=>array('index')),
	array('label'=>'Create ZhuboTag', 'url'=>array('create')),
	array('label'=>'View ZhuboTag', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ZhuboTag', 'url'=>array('admin')),
);
?>

<h1>Update ZhuboTag <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>