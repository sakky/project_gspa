<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($user,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($user,'firstname'); ?>
		<?php echo $form->textField($user,'firstname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'firstname'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($user,'lastname'); ?>
		<?php echo $form->textField($user,'lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'lastname'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>20,'maxlength'=>32)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('onClick'=>'window.location="'.Yii::app()->createUrl('site/index').'"')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->