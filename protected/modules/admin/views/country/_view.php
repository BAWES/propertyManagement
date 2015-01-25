<?php
/* @var $this CountryController */
/* @var $data Country */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->country_id), array('view', 'id'=>$data->country_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->country_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_name_ar')); ?>:</b>
	<?php echo CHtml::encode($data->country_name_ar); ?>
	<br />


</div>