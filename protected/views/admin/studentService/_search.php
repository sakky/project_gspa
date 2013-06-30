<?php
/* @var $this StudentServiceController */
/* @var $model StudentService */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ser_id'); ?>
		<?php echo $form->textField($model,'ser_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'ser_group'); ?>
		<?php echo $form->dropDownList($model, 'ser_group', $ser_group_list,array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',
                                    'ajax'  => array(
                                    'type'  => 'POST',
                                    'url' => CController::createUrl('studentService/type'),
                                    'update' => '#StudentService_ser_type_id',   //selector to update value
                                    'data' => array('ser_group'=>'js:this.value'),
                                    )
                              )); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'ser_type_id'); ?>
                <?php echo $form->dropDownList($model,'ser_type_id',$ser_type_list,array(
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
		<?php echo $form->label($model,'last_update'); ?>
		<?php list($year,$month,$day) = explode('-',$model->last_update);
                      $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'last_update',
                        'language' => 'th',

                        'options'=>array(
                                    'showAnim'=>'fold',
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    'dateFormat' => 'yy-mm-dd', // save to db format
                                    'altFormat' => 'dd/mm/yy', // show to user format
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                    ),
                        'htmlOptions' => array(
                            //'value' => ($model->last_update)?$crate_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        ),
                    )) ?>
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