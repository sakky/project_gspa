<?php
/* @var $this OrganizationController */
/* @var $data Organization */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->org_id), array('view', 'id'=>$data->org_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_en')); ?>:</b>
	<?php echo CHtml::encode($data->link_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_th')); ?>:</b>
	<?php echo CHtml::encode($data->link_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<?php /*
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