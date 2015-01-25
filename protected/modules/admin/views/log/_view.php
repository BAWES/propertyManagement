<?php
/* @var $this LogController */
/* @var $data Log */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_id), array('view', 'id'=>$data->log_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->log_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_user_type')); ?>:</b>
	<?php echo CHtml::encode($data->log_user_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_text')); ?>:</b>
	<?php echo CHtml::encode($data->log_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_affected_entity')); ?>:</b>
	<?php echo CHtml::encode($data->log_affected_entity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_affected_id')); ?>:</b>
	<?php echo CHtml::encode($data->log_affected_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->log_datetime); ?>
	<br />


</div>