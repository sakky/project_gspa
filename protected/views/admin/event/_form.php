<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'event_title_en'); ?>
		<?php echo $form->textField($model,'event_title_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_title_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_title_th'); ?>
		<?php echo $form->textField($model,'event_title_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_title_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_start'); ?>
                <?php list($year,$month,$day) = explode('-',$model->event_start);
                      $start_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'event_start',
                        'language'=>'th',

                        'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'dd/mm/yy',
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                    ),
                        'htmlOptions' => array(
                            'value' => ($model->event_start)?$start_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',                        
                        ),
                    )) ?> dd/mm/yyyy
		<?php echo $form->error($model,'event_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_end'); ?>
                <?php list($year,$month,$day) = explode('-',$model->event_end);
                      $end_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'event_end',
                        'language'=>'th',

                        'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'dd/mm/yy',
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'changeDate'=>true,
                                    'showAnim'=>'fold',
                                    //'showButtonPanel'=>true,
                                    'debug'=>true,

                                    ),
                        'htmlOptions' => array(
                            'value' => ($model->event_end)?$end_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',                        
                        ),
                    )) ?> dd/mm/yyyy
		<?php echo $form->error($model,'event_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_en'); ?>
		<?php echo $form->textField($model,'location_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location_en'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'location_th'); ?>
		<?php echo $form->textField($model,'location_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location_th'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'event_url'); ?>
		<?php echo $form->textField($model,'event_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_url'); ?>
	</div>        

	<div class="row">
		<?php echo $form->labelEx($model,'event_status'); ?>
		<?php echo $form->dropDownList($model, 'event_status', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php echo $form->error($model,'event_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->