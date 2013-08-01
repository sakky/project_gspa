<?php
/* @var $this AdmissionController */
/* @var $data Admission */
?>

<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('admission_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->admission_id), array('view', 'id'=>$data->admission_id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode($data->location->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program_id')); ?>:</b>
	<?php echo CHtml::encode($data->program->name); ?>
	<br />

	<b>ชื่อ - นามสกุล:</b>
	<?php echo CHtml::encode($data->firstname_th); ?> <?php echo CHtml::encode($data->lastname_th); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname_en')); ?>:</b>
	<?php echo CHtml::encode($data->firstname_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname_en')); ?>:</b>
	<?php echo CHtml::encode($data->lastname_en); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
	<?php echo CHtml::encode($data->district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amphur')); ?>:</b>
	<?php echo CHtml::encode($data->amphur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
	<?php echo CHtml::encode($data->postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_phone')); ?>:</b>
	<?php echo CHtml::encode($data->home_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_phone')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_end_1')); ?>:</b>
	<?php echo CHtml::encode($data->year_end_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_1')); ?>:</b>
	<?php echo CHtml::encode($data->university_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_1')); ?>:</b>
	<?php echo CHtml::encode($data->major_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree_1')); ?>:</b>
	<?php echo CHtml::encode($data->degree_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_1')); ?>:</b>
	<?php echo CHtml::encode($data->score_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_end_2')); ?>:</b>
	<?php echo CHtml::encode($data->year_end_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_2')); ?>:</b>
	<?php echo CHtml::encode($data->university_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_2')); ?>:</b>
	<?php echo CHtml::encode($data->major_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree_2')); ?>:</b>
	<?php echo CHtml::encode($data->degree_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_2')); ?>:</b>
	<?php echo CHtml::encode($data->score_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_end_3')); ?>:</b>
	<?php echo CHtml::encode($data->year_end_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_3')); ?>:</b>
	<?php echo CHtml::encode($data->university_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_3')); ?>:</b>
	<?php echo CHtml::encode($data->major_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree_3')); ?>:</b>
	<?php echo CHtml::encode($data->degree_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_3')); ?>:</b>
	<?php echo CHtml::encode($data->score_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_end_4')); ?>:</b>
	<?php echo CHtml::encode($data->year_end_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_4')); ?>:</b>
	<?php echo CHtml::encode($data->university_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_4')); ?>:</b>
	<?php echo CHtml::encode($data->major_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree_4')); ?>:</b>
	<?php echo CHtml::encode($data->degree_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_4')); ?>:</b>
	<?php echo CHtml::encode($data->score_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_end_5')); ?>:</b>
	<?php echo CHtml::encode($data->year_end_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university_5')); ?>:</b>
	<?php echo CHtml::encode($data->university_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major_5')); ?>:</b>
	<?php echo CHtml::encode($data->major_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('degree_5')); ?>:</b>
	<?php echo CHtml::encode($data->degree_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_5')); ?>:</b>
	<?php echo CHtml::encode($data->score_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_1')); ?>:</b>
	<?php echo CHtml::encode($data->training_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_2')); ?>:</b>
	<?php echo CHtml::encode($data->training_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_3')); ?>:</b>
	<?php echo CHtml::encode($data->training_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_4')); ?>:</b>
	<?php echo CHtml::encode($data->training_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training_5')); ?>:</b>
	<?php echo CHtml::encode($data->training_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_experience')); ?>:</b>
	<?php echo CHtml::encode($data->work_experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('career')); ?>:</b>
	<?php echo CHtml::encode($data->career); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary')); ?>:</b>
	<?php echo CHtml::encode($data->salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period')); ?>:</b>
	<?php echo CHtml::encode($data->period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_add')); ?>:</b>
	<?php echo CHtml::encode($data->company_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_road')); ?>:</b>
	<?php echo CHtml::encode($data->company_road); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_district')); ?>:</b>
	<?php echo CHtml::encode($data->company_district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_amphur')); ?>:</b>
	<?php echo CHtml::encode($data->company_amphur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_province')); ?>:</b>
	<?php echo CHtml::encode($data->company_province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_postcode')); ?>:</b>
	<?php echo CHtml::encode($data->company_postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_phone')); ?>:</b>
	<?php echo CHtml::encode($data->company_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_department')); ?>:</b>
	<?php echo CHtml::encode($data->company_department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_name_1')); ?>:</b>
	<?php echo CHtml::encode($data->ref_name_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_position_1')); ?>:</b>
	<?php echo CHtml::encode($data->ref_position_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_company_1')); ?>:</b>
	<?php echo CHtml::encode($data->ref_company_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_phone_1')); ?>:</b>
	<?php echo CHtml::encode($data->ref_phone_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_name_2')); ?>:</b>
	<?php echo CHtml::encode($data->ref_name_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_position_2')); ?>:</b>
	<?php echo CHtml::encode($data->ref_position_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_company_2')); ?>:</b>
	<?php echo CHtml::encode($data->ref_company_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_phone_2')); ?>:</b>
	<?php echo CHtml::encode($data->ref_phone_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_name_3')); ?>:</b>
	<?php echo CHtml::encode($data->ref_name_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_position_3')); ?>:</b>
	<?php echo CHtml::encode($data->ref_position_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_company_3')); ?>:</b>
	<?php echo CHtml::encode($data->ref_company_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_phone_3')); ?>:</b>
	<?php echo CHtml::encode($data->ref_phone_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('succeed')); ?>:</b>
	<?php echo CHtml::encode($data->succeed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('goal')); ?>:</b>
	<?php echo CHtml::encode($data->goal); ?>
	<br />

	*/ ?>

</div>