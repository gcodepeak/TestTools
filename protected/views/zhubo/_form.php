<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zhubo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'local_id'); ?>
		<?php echo $form->textField($model,'local_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'local_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'head_img'); ?>
		<?php echo $form->textField($model,'head_img',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'head_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_id'); ?>
		<?php echo $form->textField($model,'site_id'); ?>
		<?php echo $form->error($model,'site_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wealth_level'); ?>
		<?php echo $form->textField($model,'wealth_level'); ?>
		<?php echo $form->error($model,'wealth_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_level'); ?>
		<?php echo $form->textField($model,'time_level'); ?>
		<?php echo $form->error($model,'time_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'familys'); ?>
		<?php echo $form->textField($model,'familys',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'familys'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'constellation'); ?>
		<?php echo $form->textField($model,'constellation',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'constellation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hots'); ?>
		<?php echo $form->textField($model,'hots',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hots'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fans'); ?>
		<?php echo $form->textField($model,'fans',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_num'); ?>
		<?php echo $form->textField($model,'news_num',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'news_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_photo_num'); ?>
		<?php echo $form->textField($model,'news_photo_num',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'news_photo_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_live'); ?>
		<?php echo $form->textField($model,'is_live'); ?>
		<?php echo $form->error($model,'is_live'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_live_time'); ?>
		<?php echo $form->textField($model,'last_live_time'); ?>
		<?php echo $form->error($model,'last_live_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textArea($model,'photos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->