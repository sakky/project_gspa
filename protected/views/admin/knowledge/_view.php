<?php
/* @var $this KnowledgeController */
/* @var $data Knowledge */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('know_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->know_id), array('view', 'id'=>$data->know_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('know_group')); ?>:</b>
	<?php echo CHtml::encode($data->know_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('know_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->know_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_en')); ?>:</b>
	<?php echo CHtml::encode($data->desc_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_th')); ?>:</b>
	<?php echo CHtml::encode($data->desc_th); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_stamp')); ?>:</b>
	<?php echo CHtml::encode($data->time_stamp); ?>
	<br />

	*/ ?>

</div>