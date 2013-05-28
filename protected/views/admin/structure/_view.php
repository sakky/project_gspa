<?php
/* @var $this StructureController */
/* @var $data Structure */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->str_id), array('view', 'id'=>$data->str_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->str_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_en')); ?>:</b>
	<?php echo CHtml::encode($data->position_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_th')); ?>:</b>
	<?php echo CHtml::encode($data->position_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_stamp')); ?>:</b>
	<?php echo CHtml::encode($data->time_stamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>