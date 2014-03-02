<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */

$this->breadcrumbs=array(
	//'Zhubo Tags'=>array('index'),
	'标注主播',
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
	$('#zhubo-grid').yiiGridView('update', {
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

<p style="margin-top: 10px;">你可以使用比较操作符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) 在列顶端进行搜索. &nbsp&nbsp 秀场编号和名称对应关系：<span style="color:red">1:我秀；2:YY；3:新浪；4:6间房</span>
&nbsp&nbsp
<!-- ?php echo CHtml::link('显示高级搜索','#',array('class'=>'search-button')); ?-->
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_zhubo_search',array(
	'model'=>$zhubo,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zhubo-grid',
	'dataProvider'=>$zhubo->toTagSearch(),
	'filter'=>$zhubo,
	'template' => "{items}\n{summary}\n{pager}",
	'columns'=>array(
		//'id',
		/*
		array(
			'class'=>'CDataColumn',
			'name'=>'id',
			'htmlOptions'=>array('width'=>'10px','style'=>'text-align:center'),
		),*/
		//'local_id',
		array(
			'class'=>'CDataColumn',
			'name'=>'local_id',
			'htmlOptions'=>array('width'=>'10px','style'=>'text-align:center'),
		),
		//'url',
		'name',
		//'head_img',
		//'site_id',
		array(
				'class'=>'CDataColumn',
				'name'=>'site_id',
				'htmlOptions'=>array('width'=>'10px','style'=>'text-align:center'),
		),
		//'showSite.name',
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
		//'is_live',
		array(
			'class'=>'CDataColumn',
			'name'=>'is_live',
			'htmlOptions'=>array('width'=>'10px','style'=>'text-align:center'),
		),
		'last_live_time',
		//'photos',
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'修改主播信息',
			'template'=>'{view1}',
			'buttons'=>array(
					'view1'=>array(
							'label'=>"修改主播信息",
							'url'=>'Yii::app()->createUrl("zhubo/update",array("id"=>$data->id))',
							'options'=>array("target"=>"_blank"),
					),
			),
			'htmlOptions'=>array(
					'width'=>'100px',
					'style'=>'text-align:center',
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
				'htmlOptions'=>array(
					'width'=>'100px',
					'style'=>'text-align:center',
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
								'options'=>array("target"=>"_blank"),
						),
				),
		),
	),
)); ?>

