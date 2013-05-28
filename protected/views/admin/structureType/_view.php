<?php
/* @var $this StructureTypeController */
/* @var $data StructureType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('str_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->str_type_id), array('view', 'id'=>$data->str_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_th')); ?>:</b>
	<?php echo CHtml::encode($data->name_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>