<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'log_user_id'); ?>
		<?php echo $form->textField($model,'log_user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'log_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_user_type'); ?>
		<?php echo $form->textField($model,'log_user_type',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'log_user_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_text'); ?>
		<?php echo $form->textArea($model,'log_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'log_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_affected_entity'); ?>
		<?php echo $form->textField($model,'log_affected_entity',array('size'=>48,'maxlength'=>48)); ?>
		<?php echo $form->error($model,'log_affected_entity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_affected_id'); ?>
		<?php echo $form->textField($model,'log_affected_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'log_affected_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_datetime'); ?>
		<?php echo $form->textField($model,'log_datetime'); ?>
		<?php echo $form->error($model,'log_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->