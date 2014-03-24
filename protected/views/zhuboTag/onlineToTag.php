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

<div id="taged-grid" class="grid-view">
<table class="items">
<thead>
<tr>
<th>本站ID</th>
<th>原始ID</th>
<th>昵称</th>
<th>秀场</th>
<th>直播</th>
<th>已修图</th>
<th>已标注的Tag(只显示5个)</th>
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
	print '<td>'.$zhubo['siteName'].'</td>';
	print '<td>'.$zhubo['is_live'].'</td>';
	// 如果head_image路径包含"modified_img",则表示已经修图
	if(strpos($zhubo['head_img'],'modified_img') != false){
		print '<td>1</td>';
	} else {
		print '<td>0</td>';
	}
	if (isset($zhubo['tagids'])){
		print '<td>'.implode($zhubo['tags'],', ').'</td>';
		//print '<td>'.$zhubo['tags'][0].'</td>';
	} else {
		print '<td></td>';
	}
	print '<td><a target="_blank" title="打tag" href="/zhubo/update/'.$zhubo['id'].'">修改主播信息</a></td>';
	print '<td><a target="_blank" title="打tag" href="/zhibo/zhibo/'.$zhubo['id'].'">直播链接</a></td>';
	print '<td><a target="_blank" title="打tag" href="/zhuboTag/doTag?zhubo_id='.$zhubo['id'].'">打tag</a></td>';
	
	$index++;
}
?>
</tbody>
</table>
</div>

