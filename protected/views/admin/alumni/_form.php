<?php
/* @var $this AlumniController */
/* @var $model Alumni */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumni-form',
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
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model, 'sex', array('M'=>'ชาย','F'=>'หญิง')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?><br/>
                <?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/alumni/' . $model->image, '', array('style'=>'width: 100px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_en'); ?>
		<?php echo $form->textField($model,'major_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_th'); ?>
		<?php echo $form->textField($model,'major_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campus_en'); ?>
		<?php echo $form->textField($model,'campus_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'campus_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campus_th'); ?>
		<?php echo $form->textField($model,'campus_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'campus_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_en'); ?>
		<?php echo $form->textField($model,'position_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'position_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position_th'); ?>
		<?php echo $form->textField($model,'position_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'position_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_en'); ?><br/>
		<?php 
                    $this->widget('application.extensions.cleditor.ECLEditor', array(
                    'model'=>$model,
                    'attribute'=>'desc_en', //Model attribute name. Nome do atributo do modelo.
                    'options'=>array(
                        'width'=>'600',
                        'height'=>'250',
                        'useCSS'=>true,
                    ),
                    'value'=>$model->desc_en, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                ));?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_th'); ?><br/>
		<?php 
                    $this->widget('application.extensions.cleditor.ECLEditor', array(
                    'model'=>$model,
                    'attribute'=>'desc_th', //Model attribute name. Nome do atributo do modelo.
                    'options'=>array(
                        'width'=>'600',
                        'height'=>'250',
                        'useCSS'=>true,
                    ),
                    'value'=>$model->desc_th, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                ));?>
		<?php echo $form->error($model,'desc_th'); ?>
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