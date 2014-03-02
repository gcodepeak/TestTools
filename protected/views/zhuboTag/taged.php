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

<style>
table td {
	text-align:center;
}
</style>

<form id="yw0" action="/zhuboTag/admin" method="get">
	<div class="row">		
		<label for="ZhuboTag_tag_id">Tag</label>
		<input size="10" maxlength="10" name="ZhuboTag[tag_id]" id="ZhuboTag_tag_id" type="text" />
		<label for="ZhuboTag_zhubo_id">主播名称</label>
		<input size="10" maxlength="10" name="ZhuboTag[zhubo_id]" id="ZhuboTag_zhubo_id" type="text" />
		<label for="ZhuboTag_user_id">标注人</label>		
		<input size="10" maxlength="10" name="ZhuboTag[user_id]" id="ZhuboTag_user_id" type="text" />
		<label for="ZhuboTag_tag_time">标注时间</label>		
		<input name="ZhuboTag[tag_time]" id="ZhuboTag_tag_time" type="text" />
		
		<input type="submit" name="yt0" value="搜索" />
	</div>
</form>
<!--?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?-->

<div class="search-form" style="display:none">
<!-- ?php $this->renderPartial('_search',array(
	//'model'=>$model,
)); ?-->
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zhubo-grid',
	'dataProvider'=>$zhubo->tagedSearch(),
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