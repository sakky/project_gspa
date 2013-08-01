<?php
/* @var $this AdmissionController */
/* @var $model Admission */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admission-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model,'location_id',array(
                                                                        '1'=>'วิทยาลัยการบริหารรัฐกิจ มหาลัยบูรพา(ชลบุรี)',
                                                                        '4'=>'ศูนย์การศึกษาจันทบุรี',
                                                                        '5'=>'ศูนย์การศึกษาสระแก้ว')
                                                                    ); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'program_id'); ?>
		<?php echo $form->textField($model,'program_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'program_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname_th'); ?>
		<?php echo $form->textField($model,'firstname_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'firstname_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname_th'); ?>
		<?php echo $form->textField($model,'lastname_th',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lastname_th'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname_en'); ?>
		<?php echo $form->textField($model,'firstname_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'firstname_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname_en'); ?>
		<?php echo $form->textField($model,'lastname_en',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lastname_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amphur'); ?>
		<?php echo $form->textField($model,'amphur',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'amphur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_phone'); ?>
		<?php echo $form->textField($model,'home_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'home_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mobile_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_end_1'); ?>
		<?php echo $form->textField($model,'year_end_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year_end_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_1'); ?>
		<?php echo $form->textField($model,'university_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_1'); ?>
		<?php echo $form->textField($model,'major_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_1'); ?>
		<?php echo $form->textField($model,'degree_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_1'); ?>
		<?php echo $form->textField($model,'score_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'score_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_end_2'); ?>
		<?php echo $form->textField($model,'year_end_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year_end_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_2'); ?>
		<?php echo $form->textField($model,'university_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_2'); ?>
		<?php echo $form->textField($model,'major_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_2'); ?>
		<?php echo $form->textField($model,'degree_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_2'); ?>
		<?php echo $form->textField($model,'score_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'score_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_end_3'); ?>
		<?php echo $form->textField($model,'year_end_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year_end_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_3'); ?>
		<?php echo $form->textField($model,'university_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_3'); ?>
		<?php echo $form->textField($model,'major_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_3'); ?>
		<?php echo $form->textField($model,'degree_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_3'); ?>
		<?php echo $form->textField($model,'score_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'score_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_end_4'); ?>
		<?php echo $form->textField($model,'year_end_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year_end_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_4'); ?>
		<?php echo $form->textField($model,'university_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_4'); ?>
		<?php echo $form->textField($model,'major_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_4'); ?>
		<?php echo $form->textField($model,'degree_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_4'); ?>
		<?php echo $form->textField($model,'score_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'score_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_end_5'); ?>
		<?php echo $form->textField($model,'year_end_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year_end_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university_5'); ?>
		<?php echo $form->textField($model,'university_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major_5'); ?>
		<?php echo $form->textField($model,'major_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'major_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree_5'); ?>
		<?php echo $form->textField($model,'degree_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_5'); ?>
		<?php echo $form->textField($model,'score_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'score_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_1'); ?>
		<?php echo $form->textField($model,'training_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'training_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_2'); ?>
		<?php echo $form->textField($model,'training_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'training_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_3'); ?>
		<?php echo $form->textField($model,'training_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'training_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_4'); ?>
		<?php echo $form->textField($model,'training_4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'training_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'training_5'); ?>
		<?php echo $form->textField($model,'training_5',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'training_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_experience'); ?>
		<?php echo $form->textArea($model,'work_experience',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'work_experience'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'career'); ?>
		<?php echo $form->textField($model,'career',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'career'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary'); ?>
		<?php echo $form->textField($model,'salary',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period'); ?>
		<?php echo $form->textField($model,'period',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_add'); ?>
		<?php echo $form->textField($model,'company_add',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_road'); ?>
		<?php echo $form->textField($model,'company_road',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_road'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_district'); ?>
		<?php echo $form->textField($model,'company_district',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_amphur'); ?>
		<?php echo $form->textField($model,'company_amphur',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_amphur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_province'); ?>
		<?php echo $form->textField($model,'company_province',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_postcode'); ?>
		<?php echo $form->textField($model,'company_postcode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_phone'); ?>
		<?php echo $form->textField($model,'company_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_department'); ?>
		<?php echo $form->textField($model,'company_department',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_name_1'); ?>
		<?php echo $form->textField($model,'ref_name_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_name_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_position_1'); ?>
		<?php echo $form->textField($model,'ref_position_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_position_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_company_1'); ?>
		<?php echo $form->textField($model,'ref_company_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_company_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_phone_1'); ?>
		<?php echo $form->textField($model,'ref_phone_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_phone_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_name_2'); ?>
		<?php echo $form->textField($model,'ref_name_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_name_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_position_2'); ?>
		<?php echo $form->textField($model,'ref_position_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_position_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_company_2'); ?>
		<?php echo $form->textField($model,'ref_company_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_company_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_phone_2'); ?>
		<?php echo $form->textField($model,'ref_phone_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_phone_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_name_3'); ?>
		<?php echo $form->textField($model,'ref_name_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_name_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_position_3'); ?>
		<?php echo $form->textField($model,'ref_position_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_position_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_company_3'); ?>
		<?php echo $form->textField($model,'ref_company_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_company_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_phone_3'); ?>
		<?php echo $form->textField($model,'ref_phone_3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ref_phone_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'succeed'); ?>
		<?php echo $form->textArea($model,'succeed',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'succeed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason'); ?>
		<?php echo $form->textArea($model,'reason',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goal'); ?>
		<?php echo $form->textArea($model,'goal',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'goal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->