<?php
/* @var $this ShowSiteController */
/* @var $model ShowSite */

$this->breadcrumbs=array(
	'Show Sites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShowSite', 'url'=>array('index')),
	array('label'=>'Manage ShowSite', 'url'=>array('admin')),
);
?>

<h1>Create ShowSite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>