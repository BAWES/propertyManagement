<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->textField($model,'country_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_name_en'); ?>
		<?php echo $form->textField($model,'city_name_en',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'city_name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_name_ar'); ?>
		<?php echo $form->textField($model,'city_name_ar',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'city_name_ar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->