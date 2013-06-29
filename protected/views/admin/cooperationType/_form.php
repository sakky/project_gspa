<?php
/* @var $this CooperationTypeController */
/* @var $model CooperationType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cooperation-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'name_en'); ?>
		<?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_th'); ?>
		<?php echo $form->textField($model,'name_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group'); ?>
                <?php echo $form->dropDownList($model, 'group', array('inbound'=>'ในประเทศ','outbound'=>'ต่างประเทศ')); ?>
		<?php echo $form->error($model,'group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->