<?php
/* @var $this TagController */
/* @var $model Tag */

$this->breadcrumbs=array(
	'Tags'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tag', 'url'=>array('index')),
	array('label'=>'Create Tag', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tag-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<style>
table td {
	text-align:center;
}
</style>

<form id="tag-form" action="/tag/create" method="post">
	
	<div class="row">
		<span><strong>新建一个标签</strong>:&nbsp&nbsp</span>
		<label for="Tag_class_1">一级分类</label>		
		<input size="20" maxlength="32" name="Tag[class_1]" id="Tag_class_1" type="text" />
		<label for="Tag_class_2">二级分类</label>		
		<input size="20" maxlength="32" name="Tag[class_2]" id="Tag_class_2" type="text" />
		<label for="Tag_name">Tag名称</label>
		<input size="20" maxlength="64" name="Tag[name]" id="Tag_name" type="text" />
		<label for="Tag_show_name">级别</label>
		<input size="20" maxlength="64" name="Tag[show_name]" id="show_name" type="text" />
		<label for="Tag_weight">权重</label>
		<input size="20" maxlength="64" name="Tag[weight]" id="weight" type="text" />
		<span>&nbsp&nbsp&nbsp&nbsp</span>
		<input type="submit" name="yt0" value="创建" />
	</div>
</form>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tag-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'class_1',
		'class_2',
		'name',
		'show_name',
		'weight',
		'status',
		array(
			'class'=>'CButtonColumn',
			'header'=>'修改TAG信息',
			'template'=>'{view1}',
			'buttons'=>array(
				'view1'=>array(
					'label'=>"修改信息",
					'url'=>'Yii::app()->createUrl("tag/update",array("id"=>$data->id))',
					//'options'=>array("target"=>"_blank"),
				),
			),
			'htmlOptions'=>array(
				'width'=>'100px',
				'style'=>'text-align:center',
			),
		),

		array(
			'class'=>'CLinkColumn',
			'header'=>'隐藏/显示',
			'labelExpression'=>'$data->status=="1"?"隐藏":"<span style=\"color:red;\">显示"',
			'urlExpression'=>'Yii::app()->createUrl("tag/hide",array("id"=>$data->id))',			
		),
	),
)); ?>
