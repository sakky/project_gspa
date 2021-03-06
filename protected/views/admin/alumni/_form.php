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
		<?php echo $form->labelEx($model,'alumni_group'); ?>
                <?php echo $form->dropDownList($model, 'alumni_group', array('Master'=>'ปริญญาโท','Doctor'=>'ปริญญาเอก'),                              array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',
                                    'ajax'  => array(
                                    'type'  => 'POST',
                                    'url' => CController::createUrl('alumni/type'),
                                    'update' => '#Alumni_alumni_no_id',   //selector to update value
                                    'data' => array('alumni_group'=>'js:this.value'),
                                    )
                              )); ?>
		<?php echo $form->error($model,'alumni_group'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'alumni_no_id'); ?>
                <?php echo $form->dropDownList($model, 'alumni_no_id', $alumni_no_list,array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',)); ?>
		<?php echo $form->error($model,'alumni_no_id'); ?>
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

	<div class="row">
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
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
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