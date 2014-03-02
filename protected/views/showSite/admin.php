<?php
/* @var $this ShowSiteController */
/* @var $model ShowSite */

$this->breadcrumbs=array(
	'Show Sites'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ShowSite', 'url'=>array('index')),
	array('label'=>'Create ShowSite', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#show-site-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'show-site-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'weight',
		//array(
		//	'class'=>'CButtonColumn',
		//),
		array(
			'class'=>'CLinkColumn',
			'header'=>'查看',
			'label'=>'查看',
			'urlExpression'=>'Yii::app()->createUrl("showSite/view",array("id"=>$data->id))',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'修改',
			'label'=>'修改',
			'urlExpression'=>'Yii::app()->createUrl("showSite/update",array("id"=>$data->id))',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'删除',
			'label'=>'删除',
			'urlExpression'=>'Yii::app()->createUrl("showSite/delete",array("id"=>$data->id))',
		),
	),
)); ?>
