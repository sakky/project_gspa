<?php
/* @var $this NewsGroup2Controller */
/* @var $data NewsGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_group_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->news_group_id), array('view', 'id'=>$data->news_group_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->news_type_id); ?>
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