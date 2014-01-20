<?php
/* @var $this TagController */
/* @var $data Tag */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_1')); ?>:</b>
	<?php echo CHtml::encode($data->class_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_2')); ?>:</b>
	<?php echo CHtml::encode($data->class_2); ?>
	<br />


</div>