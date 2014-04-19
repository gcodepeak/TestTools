<?php
/* @var $this ZhuboTagController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zhubo Tags',
);

$this->menu=array(
	array('label'=>'Create ZhuboTag', 'url'=>array('create')),
	array('label'=>'Manage ZhuboTag', 'url'=>array('admin')),
);
?>

<h1>Zhubo Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
