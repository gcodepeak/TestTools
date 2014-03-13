<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */

$this->breadcrumbs=array(
	//'Zhubo Tags'=>array('index'),
	'Tag主播管理',
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

<form id="yw0" action="/zhuboTag/taged" method="post">
	<div class="row">
		<label>Tag名称</label>
		<input size="10" maxlength="10" name="Search[tagName]" type="text" placeholder="好声音"
		<?php if(isset($search['tagName'])) echo 'value="'.$search['tagName'].'"' ?>
		/>
		
		<label>主播名称</label>
		<input size="10" maxlength="10" name="Search[zhuboName]" type="text" placeholder="美"
		<?php if(isset($search['zhuboName'])) echo 'value="'.$search['zhuboName'].'"' ?>
		/>
		
		<label>秀场名称</label>
		<input size="10" maxlength="10" name="Search[siteName]" type="text" placeholder="我秀"
		<?php if(isset($search['siteName'])) echo 'value="'.$search['siteName'].'"' ?>
		/>
		
		<label>正在直播(0/1)</label>
		<input size="10" maxlength="10" name="Search[is_live]" type="text" placeholder="1"
		<?php if(isset($search['is_live'])) echo 'value="'.$search['is_live'].'"'; ?>
		/>
		
		<label>标注人</label>		
		<input size="10" maxlength="10" name="Search[username]" type="text" placeholder="xiaoming"
		<?php if(isset($search['username'])) echo 'value="'.$search['username'].'"' ?>
		/>
		
		<input type="submit" name="yt0" value="搜索" />
		
		<a href="/zhuboTag/taged">清空搜索条件</a>
		
		<label>(框内是提示，请自行输入条件，支持部分匹配)</label>
	</div>
</form>

<div id="taged-grid" class="grid-view">
<table class="items">
<thead>
<tr>
<th>本站ID</th>
<th>原始ID</th>
<th>昵称</th>
<th>秀场</th>
<th>直播</th>
<th>标注人</th>
<th>Tags</th>
<th>修改主播信息</th>
<th>直播房间</th>
<th>打tag</th>
</thead>
<tbody>
<?php 
$index = 0;

foreach ($zhubos as $zhubo){
	if ($index % 2 == 0){
		print '<tr class="odd">';
	}else {
		print '<tr class="even">';
	}
	
	print '<td>'.$zhubo['id'].'</td>';
	print '<td>'.$zhubo['local_id'].'</td>';
	print '<td>'.$zhubo['name'].'</td>';
	print '<td>'.$zhubo['SiteName'].'</td>';
	print '<td>'.$zhubo['is_live'].'</td>';
	print '<td>'.$zhubo['username'].'</td>';
	print '<td>'.$zhubo['tageds'].'</td>';
	print '<td><a target="_blank" title="打tag" href="/zhubo/update/'.$zhubo['id'].'">修改主播信息</a></td>';
	print '<td><a target="_blank" title="打tag" href="/zhibo/zhibo/'.$zhubo['id'].'">直播链接</a></td>';
	print '<td><a target="_blank" title="打tag" href="/zhuboTag/doTag?zhubo_id='.$zhubo['id'].'">打tag</a></td>';
	
	$index++;
}
?>
</tbody>
</table>
</div>

<!--?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?-->

<div class="search-form" style="display:none">
<!-- ?php $this->renderPartial('_search',array(
	//'model'=>$model,
)); ?-->
</div><!-- search-form -->