<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
        <div class="row">
		<?php echo $form->labelEx($model,'doc_type_id'); ?>
                <?php echo $form->dropDownList($model,'doc_type_id',$doc_type_list,array(
                            'prompt' => '--กรุณาเลือกประเภท--',
                            'value' => '0',)); ?>
		<?php echo $form->error($model,'doc_type_id'); ?>
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
		<?php echo $form->labelEx($model,'desc_en'); ?><br/>
                <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'desc_en',
                        'config'=>array(
                                'id'=>'xheditor_1',
                                'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
                                'skin'=>'default', // default, nostyle, o2007blue, o2007silver, vista
                                'width'=>'700px',
                                'height'=>'300px',
                                'loadCSS'=>XHtml::cssUrl('editor.css'),
                                'upLinkUrl'=>$this->createUrl('request/uploadFile'),
                                'upLinkExt'=>'zip,rar,txt,pdf',
                                'upImgUrl'=>$this->createUrl('request/uploadFile'),
                                'upImgExt'=>'jpg,jpeg,gif,png',
                        ),
                )); ?>
                
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row"><br/>
		<?php echo $form->labelEx($model,'desc_th'); ?><br/>
                 <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'desc_th',
                        'config'=>array(
                                'id'=>'xheditor_2',
                                'tools'=>'mfull', // mini, simple, mfull, full or from XHeditor::$_tools, tool names are case sensitive
                                'skin'=>'default', // default, nostyle, o2007blue, o2007silver, vista
                                'width'=>'700px',
                                'height'=>'300px',
                                'loadCSS'=>XHtml::cssUrl('editor.css'),
                                'upLinkUrl'=>$this->createUrl('request/uploadFile'),
                                'upLinkExt'=>'zip,rar,txt,pdf',
                                'upImgUrl'=>$this->createUrl('request/uploadFile'),
                                'upImgExt'=>'jpg,jpeg,gif,png',
                        ),
                )); ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pdf_en'); ?><br/>
                <?php if(!$model->isNewRecord) {echo $model->pdf_en." "; if($model->pdf_en) {echo cHtml::link('view', '../../uploads/documents/'.$model->pdf_en);} }?><br />
		<?php echo $form->fileField($model,'pdf_en',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pdf_th'); ?><br/>
		<?php if(!$model->isNewRecord) {echo $model->pdf_th." "; if($model->pdf_th) {echo cHtml::link('view', '../../uploads/documents/'.$model->pdf_th);} }?><br />
		<?php echo $form->fileField($model,'pdf_th',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_update'); ?>
		<?php list($year,$month,$day) = explode('-',$model->last_update);
                      $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'last_update',
                        'language' => 'th',

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
                            'value' => ($model->last_update)?$crate_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        ),
                    )) ?>
		<?php echo $form->error($model,'last_update'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::Button('ยกเลิก', array('submit' => array('index'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->