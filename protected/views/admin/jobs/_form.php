<?php
/* @var $this JobsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
            <input id="News_news_type_id" type="hidden" name="News[news_type_id]" value="3"></input>
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
		<?php echo $form->labelEx($model,'title_en'); ?>
		<?php echo $form->textArea($model,'title_en',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_th'); ?>
		<?php echo $form->textArea($model,'title_th',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title_th'); ?>
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

        <?php
        $icon_list = array('new'=>'new','hot'=>'hot','update'=>'update');
        ?>        
	<div class="row"  style="margin-top: 20px;vertical-align: middle;">
		<?php echo $form->labelEx($model,'news_icon'); ?>
		<?php echo $form->dropDownList($model,'news_icon',$icon_list,array(
                            'prompt' => '--ไม่แสดงไอคอน--',
                            'value' => '0',)); ?>
	</div>
        <div class="row buttons"><br/>         
	</div>
        
        <div class="row"><br/>
                <label>อัพโหลดไฟล์ pdf<br/>(ภาษาอังกฤษ)</label><br/>
                <?php if(!$model->isNewRecord) {echo $model->pdf_en." "; if($model->pdf_en) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/news/pdf/'.$model->pdf_en);} }?><br />
		<?php echo $form->fileField($model,'pdf_en',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_en'); ?>
	</div>

	<div class="row"><br/>
                <label>อัพโหลดไฟล์ pdf<br/>(ภาษาไทย)</label><br/>
		<?php if(!$model->isNewRecord) {echo $model->pdf_th." "; if($model->pdf_th) {echo cHtml::link('ดูไฟล์ต้นฉบับ', '../../uploads/news/pdf/'.$model->pdf_th);} }?><br />
		<?php echo $form->fileField($model,'pdf_th',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'pdf_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
                <?php list($year,$month,$day) = explode('-',$model->create_date);
                      $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'create_date',
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
                            'value' => ($model->create_date)?$crate_date:date('d/m/Y'), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        ),
                    )) ?>
		<?php echo $form->error($model,'create_date'); ?>
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