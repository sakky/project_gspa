<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ser_group'); ?>
		<?php echo $form->textField($model,'ser_group'); ?>
	</div>
    
    	<div class="row">
		<?php echo $form->label($model,'ser_name_en'); ?>
		<?php echo $form->textField($model,'ser_name_en',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ser_name'); ?>
		<?php echo $form->textField($model,'ser_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('ค้นหา'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->