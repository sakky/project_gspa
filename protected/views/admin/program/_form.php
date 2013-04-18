<?php
/* @var $this ProgramController */
/* @var $model Program */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'program-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
        <div class="row">
		<?php echo $form->labelEx($model,'program_type'); ?>
		<?php echo $form->dropDownList($model, 'program_type', array('Master'=>'หลักสูตร ป.โท','Doctor'=>'หลักสูตร ป.เอก')); ?>
		<?php echo $form->error($model,'program_type'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'desc_th'); ?>
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
		<?php echo $form->labelEx($model,'pdf_en'); ?>
                <?php if(!$model->isNewRecord) {echo $model->pdf_en." "; if($model->pdf_en) {echo cHtml::link('view', '../../uploads/programs/'.$model->pdf_en);} }?><br />
		<?php echo $form->fileField($model,'pdf_en',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdf_th'); ?>
		<?php if(!$model->isNewRecord) {echo $model->pdf_th." "; if($model->pdf_th) {echo cHtml::link('view', '../../uploads/programs/'.$model->pdf_th);} }?><br />
		<?php echo $form->fileField($model,'pdf_th',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_th'); ?>
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