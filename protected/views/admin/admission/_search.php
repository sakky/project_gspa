<?php
/* @var $this AdmissionController */
/* @var $model Admission */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'admission_id'); ?>
		<?php echo $form->textField($model,'admission_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_id'); ?>
                <?php echo $form->dropDownList($model, 'location_id',CHtml::listData(AdmissionLocation::model()->findAll(), 'location_id', 'name'),array('prompt' => '------------ กรุณาเลือกสถานที่เรียน ------------')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'program_id'); ?>
                <?php echo $form->dropDownList($model, 'program_id',CHtml::listData(AdmissionProgram::model()->findAll(), 'program_id', 'name'),array('prompt' => '------------ กรุณาเลือกสาขา ------------')); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'title'); ?>
                <?php echo $form->dropDownList($model,'title',array(''=>'--- กรุณาเลือก ---','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว','ยศ.'=>'ยศ.')); ?>
	</div>    

	<div class="row">
		<?php echo $form->label($model,'firstname_th'); ?>
		<?php echo $form->textField($model,'firstname_th',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname_th'); ?>
		<?php echo $form->textField($model,'lastname_th',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstname_en'); ?>
		<?php echo $form->textField($model,'firstname_en',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname_en'); ?>
		<?php echo $form->textField($model,'lastname_en',array('size'=>60,'maxlength'=>255)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'birthday'); ?>
		<?php
                        $day =  date("d");
                        $month =  date("m");
                        $year = date("Y")+543;
                        $today = $day.'/'.$month.'/'.$year;

                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'Admission[birthday]',
                        'language'=>'th',
                        'value' => '',
                        'options'=>array(
                                        'showAnim'=>'fold',
                                        'changeMonth'=>true,
                                        'dateFormat'=>'dd/mm/yy',
                                        'yearRange'=>'-40:+0',
                                        'changeYear'=>true,
                                        'changeDate'=>true,
                                        'showAnim'=>'fold',
                                        //'showButtonPanel'=>true,
                                        'debug'=>true,
                                        'beforeShow'=>'js:function(){
                                            if($(this).val()!=""){
                                                var arrayDate=$(this).val().split("/");
                                                arrayDate[2]=parseInt(arrayDate[2])-543;
                                                $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                            }
                                            setTimeout(function(){
                                                $.each($(".ui-datepicker-year option"),function(j,k){
                                                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                                                    $(".ui-datepicker-year option").eq(j).text(textYear);
                                                });
                                            },50);

                                            }',
                                         'onChangeMonthYear'=> 'js:function(){
                                                setTimeout(function(){
                                                    $.each($(".ui-datepicker-year option"),function(j,k){
                                                        var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                                                        $(".ui-datepicker-year option").eq(j).text(textYear);
                                                    });
                                                },50);
                                            }',
                                        'onClose'=>'js:function(){
                                            if($(this).val()!="" && $(this).val()==dateBefore){
                                                var arrayDate=dateBefore.split("/");
                                                arrayDate[2]=parseInt(arrayDate[2])+543;
                                                $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                            }
                                        }',
                                        'onSelect'=>'js:function(dateText, inst){
                                            dateBefore=$(this).val();
                                            var arrayDate=dateText.split("/");
                                            arrayDate[2]=parseInt(arrayDate[2])+543;
                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);
                                        }',
                                    ),
                            'htmlOptions' => array(
                            'class'=>'shadowdatepicker',
                            'style'=>'height:20px;',
                        ),
                    )); ?> (dd/mm/yyyy)
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amphur'); ?>
		<?php echo $form->textField($model,'amphur',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_phone'); ?>
		<?php echo $form->textField($model,'home_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile_phone'); ?>
		<?php echo $form->textField($model,'mobile_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->label($model,'year_end_1'); ?>
		<?php echo $form->textField($model,'year_end_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university_1'); ?>
		<?php echo $form->textField($model,'university_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'major_1'); ?>
		<?php echo $form->textField($model,'major_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'degree_1'); ?>
		<?php echo $form->textField($model,'degree_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_1'); ?>
		<?php echo $form->textField($model,'score_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_end_2'); ?>
		<?php echo $form->textField($model,'year_end_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university_2'); ?>
		<?php echo $form->textField($model,'university_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'major_2'); ?>
		<?php echo $form->textField($model,'major_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'degree_2'); ?>
		<?php echo $form->textField($model,'degree_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_2'); ?>
		<?php echo $form->textField($model,'score_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_end_3'); ?>
		<?php echo $form->textField($model,'year_end_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university_3'); ?>
		<?php echo $form->textField($model,'university_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'major_3'); ?>
		<?php echo $form->textField($model,'major_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'degree_3'); ?>
		<?php echo $form->textField($model,'degree_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_3'); ?>
		<?php echo $form->textField($model,'score_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_end_4'); ?>
		<?php echo $form->textField($model,'year_end_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university_4'); ?>
		<?php echo $form->textField($model,'university_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'major_4'); ?>
		<?php echo $form->textField($model,'major_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'degree_4'); ?>
		<?php echo $form->textField($model,'degree_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_4'); ?>
		<?php echo $form->textField($model,'score_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_end_5'); ?>
		<?php echo $form->textField($model,'year_end_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university_5'); ?>
		<?php echo $form->textField($model,'university_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'major_5'); ?>
		<?php echo $form->textField($model,'major_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'degree_5'); ?>
		<?php echo $form->textField($model,'degree_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_5'); ?>
		<?php echo $form->textField($model,'score_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_1'); ?>
		<?php echo $form->textField($model,'training_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_2'); ?>
		<?php echo $form->textField($model,'training_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_3'); ?>
		<?php echo $form->textField($model,'training_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_4'); ?>
		<?php echo $form->textField($model,'training_4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'training_5'); ?>
		<?php echo $form->textField($model,'training_5',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_experience'); ?>
		<?php echo $form->textArea($model,'work_experience',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'career'); ?>
		<?php echo $form->textField($model,'career',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salary'); ?>
		<?php echo $form->textField($model,'salary',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period'); ?>
		<?php echo $form->textField($model,'period',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_add'); ?>
		<?php echo $form->textField($model,'company_add',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_road'); ?>
		<?php echo $form->textField($model,'company_road',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_district'); ?>
		<?php echo $form->textField($model,'company_district',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_amphur'); ?>
		<?php echo $form->textField($model,'company_amphur',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_province'); ?>
		<?php echo $form->textField($model,'company_province',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_postcode'); ?>
		<?php echo $form->textField($model,'company_postcode',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_phone'); ?>
		<?php echo $form->textField($model,'company_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_department'); ?>
		<?php echo $form->textField($model,'company_department',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_name_1'); ?>
		<?php echo $form->textField($model,'ref_name_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_position_1'); ?>
		<?php echo $form->textField($model,'ref_position_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_company_1'); ?>
		<?php echo $form->textField($model,'ref_company_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_phone_1'); ?>
		<?php echo $form->textField($model,'ref_phone_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_name_2'); ?>
		<?php echo $form->textField($model,'ref_name_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_position_2'); ?>
		<?php echo $form->textField($model,'ref_position_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_company_2'); ?>
		<?php echo $form->textField($model,'ref_company_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_phone_2'); ?>
		<?php echo $form->textField($model,'ref_phone_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_name_3'); ?>
		<?php echo $form->textField($model,'ref_name_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_position_3'); ?>
		<?php echo $form->textField($model,'ref_position_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_company_3'); ?>
		<?php echo $form->textField($model,'ref_company_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_phone_3'); ?>
		<?php echo $form->textField($model,'ref_phone_3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'succeed'); ?>
		<?php echo $form->textArea($model,'succeed',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason'); ?>
		<?php echo $form->textArea($model,'reason',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'goal'); ?>
		<?php echo $form->textArea($model,'goal',array('rows'=>6, 'cols'=>50)); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('ค้นหา'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->