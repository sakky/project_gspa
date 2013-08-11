<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event_title_en'); ?>
		<?php echo $form->textField($model,'event_title_en',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event_title_th'); ?>
		<?php echo $form->textField($model,'event_title_th',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event_status'); ?>
		<?php echo $form->dropDownList($model, 'event_status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->