<?php
/* @var $this StudentServiceGroupController */
/* @var $model StudentServiceGroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-service-group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'ser_name_en'); ?>
		<?php echo $form->textField($model,'ser_name_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ser_name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ser_name'); ?>
		<?php echo $form->textField($model,'ser_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ser_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->