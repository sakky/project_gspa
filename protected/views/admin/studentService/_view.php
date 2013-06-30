<?php
/* @var $this StudentServiceController */
/* @var $data StudentService */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ser_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ser_id), array('view', 'id'=>$data->ser_id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('ser_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->ser_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ser_group')); ?>:</b>
	<?php echo CHtml::encode($data->ser_group); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_en')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_th')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_update')); ?>:</b>
	<?php echo CHtml::encode($data->last_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('counter')); ?>:</b>
	<?php echo CHtml::encode($data->counter); ?>
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