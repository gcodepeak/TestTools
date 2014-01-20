<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */

$this->breadcrumbs=array(
	'Zhubo Tags'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ZhuboTag', 'url'=>array('index')),
	array('label'=>'Create ZhuboTag', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#zhubo-tag-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<p>
你可以使用比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) 在列顶端进行搜索.

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zhubo-tag-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'zhubo.name',
		'tag.name',
		'user.username',
		//'zhubo_id',
		//'tag_id',
		//'user_id',
		'tag_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
