<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'left_menu_id'); ?>
		<?php echo $form->textField($model,'left_menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_type_id'); ?>
		<?php echo $form->textField($model,'page_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_th'); ?>
		<?php echo $form->textField($model,'name_th',array('size'=>60,'maxlength'=>255)); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'show_type'); ?>
		<?php echo $form->textField($model,'show_type'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
                <?php echo $form->dropDownList($model, 'status', array('1'=>'Enabled','0'=>'Disabled')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->