<?php
/* @var $this StudentServiceGroupController */
/* @var $data StudentServiceGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ser_group')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ser_group), array('view', 'id'=>$data->ser_group)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ser_name')); ?>:</b>
	<?php echo CHtml::encode($data->ser_name); ?>
	<br />


</div>