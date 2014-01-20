<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */

$this->breadcrumbs=array(
	'Zhubos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Zhubo', 'url'=>array('index')),
	array('label'=>'Create Zhubo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#zhubo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zhubo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'local_id',
		'url',
		'name',
		//'head_img',
		'site_id',
		//'showSite.name',
		
		'level',
		'wealth_level',
		'time_level',
		'sex',
		'region',
		'familys',
		//'constellation',
		//'age',
		'hots',
		'fans',
		'tags',
		//'news_num',
		//'news_photo_num',
		'is_live',
		'last_live_time',
		//'photos',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
