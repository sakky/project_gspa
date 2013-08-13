<?php
/* @var $this DirectlineController */
/* @var $data Directline */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('direct_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->direct_id), array('view', 'id'=>$data->direct_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />


</div>