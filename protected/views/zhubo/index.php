<?php
/* @var $this ZhuboController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zhubos',
);

$this->menu=array(
	array('label'=>'Create Zhubo', 'url'=>array('create')),
	array('label'=>'Manage Zhubo', 'url'=>array('admin')),
);
?>

<h1>Zhubos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
