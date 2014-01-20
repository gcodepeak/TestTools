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

<p>你可以使用比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) 在列顶端进行搜索.</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zhubo-grid',
	'dataProvider'=>$zhubo->ToTagSearch(),
	'filter'=>$zhubo,
	'columns'=>array(
		//'id',
		array(
			'class'=>'CDataColumn',
			'name'=>'id',
		),
		//'local_id',
		//'url',
		//'name',
		//'head_img',
		//'site_id',
		'showSite.name',
		//'level',
		//'wealth_level',
		//'time_level',
		'sex',
		'region',
		//'familys',
		//'constellation',
		//'age',
		//'hots',
		//'fans',
		//'tags',
		//'news_num',
		//'news_photo_num',
		'is_live',
		'last_live_time',
		//'photos',
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'更新主播',
			'template'=>'{view1}',
			'buttons'=>array(
					'view1'=>array(
							'label'=>"更新主播",
							'url'=>'Yii::app()->createUrl("zhubo/update",array("id"=>$data->id))',
					),
			),
		),
		array(
				'class'=>'CButtonColumn',
				'header'=>'直播房间',
				'template'=>'{view1}',
				'buttons'=>array(
						'view1'=>array(
								'label'=>"直播链接",
								'url'=>'Yii::app()->createUrl("zhibo/zhibo",array("id"=>$data->id))',
								'options'=>array("target"=>"_blank"),
						),
				),
		),
		
		array(
				'class'=>'CButtonColumn',
				'header'=>'打tag',
				'template'=>'{view1}',
				'buttons'=>array(
						'view1'=>array(
								'label'=>"打tag",
								'url'=>'Yii::app()->createUrl("zhuboTag/doTag",array("zhubo_id"=>$data->id))',
						),
				),
		),
	),
)); ?>

