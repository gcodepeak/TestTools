<?php
/* @var $this ZhuboTagController */
/* @var $data ZhuboTag */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_id')); ?>:</b>
	<?php echo CHtml::encode($data->tag_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zhubo_id')); ?>:</b>
	<?php echo CHtml::encode($data->zhubo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_time')); ?>:</b>
	<?php echo CHtml::encode($data->tag_time); ?>
	<br />


</div>