<?php
/* @var $this ShowSiteController */
/* @var $model ShowSite */

$this->breadcrumbs=array(
	'Show Sites'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShowSite', 'url'=>array('index')),
	array('label'=>'Create ShowSite', 'url'=>array('create')),
	array('label'=>'View ShowSite', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ShowSite', 'url'=>array('admin')),
);
?>

<h1>Update ShowSite <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>