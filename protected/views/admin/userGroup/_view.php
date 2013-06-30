<?php
/* @var $this UserGroupController */
/* @var $data UserGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_group_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_group_id), array('view', 'id'=>$data->user_group_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_menu')); ?>:</b>
	<?php echo CHtml::encode($data->user_menu); ?>
	<br />


</div>