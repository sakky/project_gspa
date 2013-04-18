<?php
/* @var $this AlumniController */
/* @var $data Alumni */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumni_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->alumni_id), array('view', 'id'=>$data->alumni_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_en')); ?>:</b>
	<?php echo CHtml::encode($data->major_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_th')); ?>:</b>
	<?php echo CHtml::encode($data->major_th); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('campus_en')); ?>:</b>
	<?php echo CHtml::encode($data->campus_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campus_th')); ?>:</b>
	<?php echo CHtml::encode($data->campus_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_en')); ?>:</b>
	<?php echo CHtml::encode($data->position_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_th')); ?>:</b>
	<?php echo CHtml::encode($data->position_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_en')); ?>:</b>
	<?php echo CHtml::encode($data->desc_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_th')); ?>:</b>
	<?php echo CHtml::encode($data->desc_th); ?>
	<br />

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