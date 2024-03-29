<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_logo'); ?>
		<?php echo $form->textField($model,'company_logo',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'company_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_license'); ?>
		<?php echo $form->textField($model,'company_license',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'company_license'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_contact_name'); ?>
		<?php echo $form->textField($model,'company_contact_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'company_contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_contact_phone'); ?>
		<?php echo $form->textField($model,'company_contact_phone',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'company_contact_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->