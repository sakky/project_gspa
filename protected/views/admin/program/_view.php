<?php
/* @var $this ProgramController */
/* @var $data Program */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('program_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->program_id), array('view', 'id'=>$data->program_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program_type')); ?>:</b>
	<?php echo CHtml::encode($data->program_type); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_en')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_en); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_th')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_th); ?>
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