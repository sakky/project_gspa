<?php
/* @var $this SlideController */
/* @var $data Slide */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('slide_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->slide_id), array('view', 'id'=>$data->slide_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
	<?php echo CHtml::encode($data->title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_th')); ?>:</b>
	<?php echo CHtml::encode($data->title_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_en')); ?>:</b>
	<?php echo CHtml::encode($data->desc_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_th')); ?>:</b>
	<?php echo CHtml::encode($data->desc_th); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('link_en')); ?>:</b>
	<?php echo CHtml::encode($data->link_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_th')); ?>:</b>
	<?php echo CHtml::encode($data->link_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
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