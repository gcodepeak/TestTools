<?php
/* @var $this TagController */
/* @var $model Tag */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tag-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_1'); ?>
		<?php echo $form->textField($model,'class_1',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'class_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_2'); ?>
		<?php echo $form->textField($model,'class_2',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'class_2'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'show_name'); ?>
		<?php echo $form->textField($model,'show_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'show_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->