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
	'pager'=>array(
			'class'=>'CLinkPager',//定义要调用的分页器类，默认是CLinkPager，需要完全自定义，还可以重写一个，参考我的另一篇博文：http://blog.sina.com.cn/s/blog_71d4414d0100yu6k.html
			// 'cssFile'=>false,//定义分页器的要调用的css文件，false为不调用，不调用则需要亲自己css文件里写这些样式
			//'header'=>'转往分页：',//定义的文字将显示在pager的最前面
			// 'footer'=>'',//定义的文字将显示在pager的最后面
			'firstPageLabel'=>'首页',//定义首页按钮的显示文字
			'lastPageLabel'=>'尾页',//定义末页按钮的显示文字
			'nextPageLabel'=>'下一页',//定义下一页按钮的显示文字
			'prevPageLabel'=>'前一页',//定义上一页按钮的显示文字
			'maxButtonCount'=>30,
			//'pageSize'=>1,
			//关于分页器这个array，具体还有很多属性，可参考CLinkPager的API
	),
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
			'class'=>'CLinkColumn',
			'header'=>'查看',
			'label'=>'查看',
			'urlExpression'=>'Yii::app()->createUrl("zhubo/view",array("id"=>$data->id))',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'修改',
			'label'=>'修改',
			'urlExpression'=>'Yii::app()->createUrl("zhubo/update",array("id"=>$data->id))',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'删除',
			'label'=>'删除',
			'urlExpression'=>'Yii::app()->createUrl("zhubo/delete",array("id"=>$data->id))',
		),
	),
)); ?>
