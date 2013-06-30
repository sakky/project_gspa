<?php
/* @var $this KnowledgeController */
/* @var $model Knowledge */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'knowledge-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>

	<?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>

	<div class="row">
                <?php echo $form->labelEx($model,'know_group'); ?>
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
		<?php echo $form->error($model,'know_group'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'know_type_id'); ?>
                <?php echo $form->dropDownList($model, 'know_type_id', $know_type_list,array(
                                    'prompt' => '--กรุณาเลือก--',
                                    'value' => '',)); ?>
		<?php echo $form->error($model,'know_type_id'); ?>
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