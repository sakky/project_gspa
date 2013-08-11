<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->event_id), array('view', 'id'=>$data->event_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_title_en')); ?>:</b>
	<?php echo CHtml::encode($data->event_title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_title_th')); ?>:</b>
	<?php echo CHtml::encode($data->event_title_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_start')); ?>:</b>
	<?php echo CHtml::encode($data->event_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_end')); ?>:</b>
	<?php echo CHtml::encode($data->event_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_url')); ?>:</b>
	<?php echo CHtml::encode($data->event_url); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('event_status')); ?>:</b>
	<?php echo CHtml::encode($data->event_status); ?>
	<br />

	*/ ?>

</div>