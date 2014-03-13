<?php
/* @var $this ZhuboController */
/* @var $model Zhubo */
/* @var $form CActiveForm */
?>
<div style="width: 80%;margin:10px auto;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zhubo-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array (
		'class'=>'form-horizontal',
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>64,'class'=>'span10')); ?>
		<?php echo $form->error($model,'url'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'head_img',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'head_img',array('size'=>60,'maxlength'=>128,'class'=>'span10')); ?>
		<?php echo $form->error($model,'head_img'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'sex',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'sex',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'sex'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'region',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'region',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'region'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'familys',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'familys',array('size'=>60,'maxlength'=>128,'class'=>'span10')); ?>
		<?php echo $form->error($model,'familys'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'constellation',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'constellation',array('size'=>16,'maxlength'=>16,'class'=>'span10')); ?>
		<?php echo $form->error($model,'constellation'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'age',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'age',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'age'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'tags',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>128,'class'=>'span10')); ?>
		<?php echo $form->error($model,'tags'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'is_live',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textField($model,'is_live',array('class'=>'span10')); ?>
		<?php echo $form->error($model,'is_live'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'photos',array('class'=>' control-label',)); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'photos',array('rows'=>2, 'cols'=>50,'class'=>'span10')); ?>
		<?php echo $form->error($model,'photos'); ?>
		</div>
	</div>

	<div class="control-group">
	    <div class="text-center" style="text-align:center;">
	      <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>"btn btn-primary")); ?>
	    </div>
  	</div>

<?php $this->endWidget(); ?>
</div>