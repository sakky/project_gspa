<?php
/* @var $this AlumniNoController */
/* @var $data AlumniNo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumni_no_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->alumni_no_id), array('view', 'id'=>$data->alumni_no_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alumni_group')); ?>:</b>
	<?php echo CHtml::encode($data->alumni_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>