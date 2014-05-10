<?php
/* @var $this ShowSiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Show Sites',
);

$this->menu=array(
	array('label'=>'Create ShowSite', 'url'=>array('create')),
	array('label'=>'Manage ShowSite', 'url'=>array('admin')),
);
?>

<h1>Show Sites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
