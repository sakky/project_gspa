<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'desc_en'); ?>
		<?php echo $form->textArea($model,'desc_en',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_th'); ?>
		<?php echo $form->textArea($model,'desc_th',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
                <?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/gallery/' . $model->image, '', array('style'=>'width: 120px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('size'=>5)); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->