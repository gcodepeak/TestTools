<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
/* @var $form CActiveForm */
?>

<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zhubo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'url'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'head_img',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'head_img',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'head_img'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sex',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'sex',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'sex'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'region',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'region',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'region'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'familys',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'familys',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'familys'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'constellation',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'constellation',array('size'=>16,'maxlength'=>16,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'constellation'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'age',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'age',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'age'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tags',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tags'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'is_live',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'is_live',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'is_live'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'last_live_time',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'last_live_time',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'last_live_time'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'photos',array('class'=>'col-sm-2 control-label',)); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model,'photos',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'photos'); ?>
		</div>
	</div>

	<div class="form-group">
	    <div class="text-center">
	      <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>"btn btn-primary")); ?>
	    </div>
  	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->