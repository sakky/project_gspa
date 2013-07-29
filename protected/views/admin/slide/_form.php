<?php
/* @var $this SlideController */
/* @var $model Slide */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slide-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->textField($model,'title_en',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_th'); ?>
		<?php echo $form->textField($model,'title_th',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_en'); ?>
                <?php echo $form->textArea($model,'desc_en',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_th'); ?>
		<?php echo $form->textArea($model,'desc_th',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_en'); ?>
		<?php echo $form->textField($model,'link_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_th'); ?>
		<?php echo $form->textField($model,'link_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link_th'); ?>
	</div>

	<div class="row">           
		<?php echo $form->labelEx($model,'image'); ?><br/>
		<?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/slide/' . $model->image, '', array('style'=>'width: 120px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?> <br/>ขนาดรูปภาพ กว้าง 830px ยาว 360px <br/>
                (ไฟล์รูปภาพนามสกุล jpg, jpeg, gif, png เท่านั้น)
		<?php echo $form->error($model,'image'); ?>
	</div>
<br/>
	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
                <?php echo $form->dropDownList($model, 'sort_order', $order_list); ?>
		<?php echo $form->error($model,'sort_order'); ?>
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