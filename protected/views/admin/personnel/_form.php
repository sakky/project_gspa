<?php
/* @var $this PersonnelController */
/* @var $model Personnel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personnel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
		<?php echo $form->labelEx($model,'personnel_type_id'); ?>
		 <?php echo $form->dropDownList($model,'personnel_type_id',$personnel_type_list,array(
                            'prompt' => '--กรุณาเลือกประเภท--',
                            'value' => '0',)); ?> กรณีไม่มีข้อมูลคลิกเพิ่ม <a href="<?php echo Yii::app()->createUrl('personnelType'); ?>" target="_blank">ที่นี่</a>
		<?php echo $form->error($model,'personnel_type_id'); ?>
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
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->dropDownList($model, 'sex', array('M'=>'ชาย','F'=>'หญิง')); ?>
		<?php echo $form->error($model,'sex'); ?>
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
		<?php echo $form->labelEx($model,'detail_en'); ?><br/>
                <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'detail_en',
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
		<?php echo $form->error($model,'detail_en'); ?>
	</div>
        
        <div class="row">           
		<?php echo $form->labelEx($model,'detail_th'); ?><br/>
                <?php $this->widget('ext.widgets.xheditor.XHeditor',array(
                        'model'=>$model,
                        'modelAttribute'=>'detail_th',
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
		<?php echo $form->error($model,'detail_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?><br/>
                <?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/personnel/' . $model->image, '', array('style'=>'width: 100px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>-->

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