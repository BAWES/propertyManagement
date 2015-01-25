<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'log_id'); ?>
		<?php echo $form->textField($model,'log_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_user_id'); ?>
		<?php echo $form->textField($model,'log_user_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_user_type'); ?>
		<?php echo $form->textField($model,'log_user_type',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_text'); ?>
		<?php echo $form->textArea($model,'log_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_affected_entity'); ?>
		<?php echo $form->textField($model,'log_affected_entity',array('size'=>48,'maxlength'=>48)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_affected_id'); ?>
		<?php echo $form->textField($model,'log_affected_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log_datetime'); ?>
		<?php echo $form->textField($model,'log_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->