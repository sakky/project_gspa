<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'know_id'); ?>
		<?php echo $form->textField($model,'know_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'know_group'); ?>
		<?php echo $form->dropDownList($model, 'know_group', array('1'=>'การจัดการความรู้','2'=>'หมวดความรู้','3'=>'สารคดี'),                              array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',
                                    'ajax'  => array(
                                    'type'  => 'POST',
                                    'url' => CController::createUrl('knowledge/type'),
                                    'update' => '#Knowledge_know_type_id',   //selector to update value
                                    'data' => array('know_group'=>'js:this.value'),
                                    )
                              )); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'know_type_id'); ?>
		<?php echo $form->dropDownList($model, 'know_type_id', $know_type_list,array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',)); ?>
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
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('ค้นหา'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->