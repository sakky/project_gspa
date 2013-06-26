<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'report_id'); ?>
		<?php echo $form->textField($model,'report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'report_type_id'); ?>
                <?php echo $form->dropDownList($model,'report_type_id',$report_type_list,array(
                            'prompt' => '--กรุณาเลือกประเภท--',
                            'value' => '0',)); ?>
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
		<?php echo $form->label($model,'desc_en'); ?>
		<?php echo $form->textArea($model,'desc_en',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc_th'); ?>
		<?php echo $form->textArea($model,'desc_th',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('size'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('ค้นหา'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->