<?php
/* @var $this ZhuboTagController */
/* @var $model ZhuboTag */
?>
<?php echo CHtml::beginForm(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
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
)); ?>

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