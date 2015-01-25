<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->company_id), array('view', 'id'=>$data->company_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_logo')); ?>:</b>
	<?php echo CHtml::encode($data->company_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_license')); ?>:</b>
	<?php echo CHtml::encode($data->company_license); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->company_contact_phone); ?>
	<br />


</div>