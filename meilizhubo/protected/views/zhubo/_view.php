<?php
/* @var $this ZhuboController */
/* @var $data Zhubo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local_id')); ?>:</b>
	<?php echo CHtml::encode($data->local_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head_img')); ?>:</b>
	<?php echo CHtml::encode($data->head_img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wealth_level')); ?>:</b>
	<?php echo CHtml::encode($data->wealth_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_level')); ?>:</b>
	<?php echo CHtml::encode($data->time_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('familys')); ?>:</b>
	<?php echo CHtml::encode($data->familys); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('constellation')); ?>:</b>
	<?php echo CHtml::encode($data->constellation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hots')); ?>:</b>
	<?php echo CHtml::encode($data->hots); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fans')); ?>:</b>
	<?php echo CHtml::encode($data->fans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_num')); ?>:</b>
	<?php echo CHtml::encode($data->news_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_photo_num')); ?>:</b>
	<?php echo CHtml::encode($data->news_photo_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_live')); ?>:</b>
	<?php echo CHtml::encode($data->is_live); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_live_time')); ?>:</b>
	<?php echo CHtml::encode($data->last_live_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photos')); ?>:</b>
	<?php echo CHtml::encode($data->photos); ?>
	<br />

	*/ ?>

</div>