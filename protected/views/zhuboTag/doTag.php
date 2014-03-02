<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */
?>
<?php echo CHtml::beginForm(); ?>

<!-- ?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tag-grid',
	'dataProvider'=>$tags,
	'columns'=>array(
		'class_1',
		'class_2',
		'name',
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'selected_tags',
			'header'=>'Tag',
			//'checkBoxHtmlOptions'=>array('class'=>'check'),
		),
	),
)); ?-->

<style>
table td {
	text-align:center;
}

table.inner td {
	width:100px;
	text-align:left;
	margin-bottom:0;
}

table.inner {
	margin-bottom:0;
}
</style>

<div id="tag-grid" class="grid-view">
<table class="items">
<thead>
<tr>
<th id="tag-grid_c0">一级分类</th>
<th id="tag-grid_c1">二级分类</th>
<th id="tag-grid_c2">Tag</th>
<!-- th class="checkbox-column" id="selected_tags">Tag</th-->
</tr>
</thead>
<tbody>

<?php 
/*
$index = 0;
$last_class1 = '';
$last_class2 = '';

foreach ($tags as $tag){
	if ($index % 2 == 0){
		print '<tr class="odd">';
	}else {
		print '<tr class="even">';
	}
	
	if ($last_class1 != $tag['class_1']) {
		print '<td rowspan=3>'.$tag['class_1'].'</td>';
		$last_class1 = $tag['class_1'];
	}
	
	if ($last_class2 != $tag['class_2']) {
		print '<td>'.$tag['class_2'].'</td>';
		$last_class2 = $tag['class_2'];
	}
	
	print '<td>'.$tag['name'].'</td>';
	print '<td><input class="select-on-check" value="'
				. $tag['id'] .'" type="checkbox" name="selected_tags[]"';
	if($tag['0'] == 1) {
			print ' checked="checked"/>';
	}
	print '</td>';
	print '</tr>';
	$index++;
}*/

$index_1 = 0;
$index_2 = 0;

// 一级分类
foreach ($tags as $key1 => $class_1){
	
	$rows = count($class_1);
	$index_2 = 0;
	
	// 二级分类，每行打印一行
	foreach ($class_1 as $key2 => $class_2) {
		if ($index_1 % 2 == 0){
			print '<tr class="odd">';
		}else {
			print '<tr class="even">';
		}
			
		if($index_2 == 0){
			print '<td rowspan='.$rows.' width="150px">'. $key1 .'</td>';
		} else {
			//print '<td></td>';
		}
		
		print '<td class="even" width="150px">'. $key2 .'</td>';
		
		print '<td>';
		print '<table class="inner">';
		$index_3 = 0;
		foreach ($class_2 as $name=>$arr) {
			if($index_3 == 0){
				print '<tr>';
			} else if($index_3 % 10 == 0){
				print '</tr><tr>';
			}
			
			print '<td style="border:0 white solid;">';
			print '&nbsp&nbsp&nbsp&nbsp<input class="select-on-check" value="'
					. $arr['id'] .'" type="checkbox" name="selected_tags[]"';
			if($arr['checked'] == 1) {
				print ' checked="checked"';
			}
			print '/>'.$name.'</td>';
			
			$index_3 ++;
		}
		
		while($index_3 % 10 != 0){
			print '<td style="width:100px;border:0 white solid;"/>';
			$index_3 ++;
		}
		print '</tr>';
		
		print '</table></td>';
		print '</tr>';
		$index_2++;
	}
	$index_1++;
}
?>

</tbody>
</table>
</div>
					
<div id="for-link" style="text-align: center;">
<?php echo CHtml::submitButton('提交', array('name' => 'submitButton')); ?>
<!-- ?php
   echo CHtml::ajaxLink('提交',Yii::app()->createUrl('zhuboTag/doTag'),
        array(
           'type'=>'GET',
           'data'=>'js:{tag_ids : $.fn.yiiGridView.getChecked("tag-grid","tag_check_boxes").toString()}'
           // pay special attention to how the data is passed here
           //'success'=>"$('#grid_view_id').yiiGridView.update('grid_view_id')",
        )
   );
?>
<div-->
<?php echo CHtml::endForm(); ?>