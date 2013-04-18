<?php
/* @var $this NewsController */
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
		<?php echo $form->labelEx($model,'news_type_id'); ?>
                <?php echo $form->dropDownList($model,'news_type_id',$news_type_list); ?><!-- กรณีไม่มีข้อมูลคลิกเพิ่ม <a href="<?php echo Yii::app()->createUrl('newstype'); ?>" target="_blank">ที่นี่</a>-->
		<?php echo $form->error($model,'news_type_id'); ?>
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
		<?php echo $form->labelEx($model,'desc_en'); ?>
                <?php $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('application.extensions.cleditor.ECLEditor', array(
                                        'model'=>$model,
                                        'attribute'=>'desc_en', 
                                        'options'=>array(
                                            'width'=>600,
                                            'height'=>250,
                                            'useCSS'=>true,
                                        ),
                                        'value'=>$model->desc_en,     ));
                    ?>
		<?php echo $form->error($model,'desc_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_th'); ?>
                <?php $this->widget('application.extensions.cleditor.ECLEditor', array(
                                    'model'=>$model,
                                    'attribute'=>'desc_th', 
                                    'options'=>array(
                                        'width'=>600,
                                        'height'=>250,
                                        'useCSS'=>true,
                                    ),
                                    'value'=>$model->desc_th,     ));
                ?>
		<?php echo $form->error($model,'desc_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php if(!$model->isNewRecord) echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/news/' . $model->image, '', array('style'=>'width: 120px')); ?><br />
		<?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
                <?php list($year,$month,$day) = explode('-',$model->create_date);
                      $crate_date = $day.'/'.$month.'/'.$year;
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'create_date',

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
                            'value' => ($model->create_date)?$crate_date:date('d/m/Y', strtotime("+1 day")), // set the default date here
                            'class'=>'shadowdatepicker',
                            'readonly'=>"readonly",
                        ),
                    )) ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

<!--	<div class="row">
		<?php //echo $form->labelEx($model,'show_homepage'); ?>
                <?php //echo $form->dropDownList($model, 'show_homepage', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php //echo $form->error($model,'show_homepage'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'show_new'); ?>
                <?php //echo $form->dropDownList($model, 'show_new', array('1'=>'แสดง','0'=>'ไม่แสดง')); ?>
		<?php //echo $form->error($model,'show_new'); ?>
	</div>-->
        
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