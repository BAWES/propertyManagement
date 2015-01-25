<?php
/* @var $this CityController */
/* @var $data City */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->city_id), array('view', 'id'=>$data->city_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->city_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name_ar')); ?>:</b>
	<?php echo CHtml::encode($data->city_name_ar); ?>
	<br />


</div>