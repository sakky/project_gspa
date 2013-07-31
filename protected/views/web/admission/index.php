<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Online Admission';
    $this->breadcrumbs=array(
            'Online Admission',
    );
    $header = "Online Admission Form";
}else{
    $this->pageTitle=Yii::app()->name. ' - สมัครเรียนออนไลน์';
    $this->breadcrumbs=array(
            'สมัครเรียนออนไลน์',
    );
    $header = "แบบฟอร์ม สมัครเรียนออนไลน์";
}
?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
       <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
       </div>
    
    <?php if(Yii::app()->user->hasFlash('admission')): ?>
    <div align="center">
        <h3>
            <?php echo Yii::app()->user->getFlash('admission'); ?>

        </h3>
        <br/>
        <a class="button" href="<?php echo Yii::app()->createUrl('site/home'); ?>">กลับสู่หน้าหลัก</a>
    </div>
    <?php else: ?>
    <h3><?php echo $header;?></h3>
    <div class="form-admission">
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'admission-form',
            'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>       
    <div align="center">
        <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/buu_logo.png" border="0" width="110px"/></div>
        <h3>มหาวิทยาลัยบูรพา</h3>
        <h4>หลักสูตรรัฐประศาสนศาสตรมหาบัณฑิต</h4>
        <h4>วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา</h4>
    </div>
    <br/>
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        <p class="note"><span class="required">*</span> ข้อมูลที่จำเป็นต้องกรอก</p>
        <?php echo $form->errorSummary($model,'กรุณากรอกข้อมูลให้ถูกต้อง');?>
        <div class="row">
            <?php echo $form->labelEx($model,'location_id'); ?>
            <?php echo $form->dropDownList($model, 'location_id',$location_list,array('prompt' => '------------ กรุณาเลือกสถานที่เรียน ------------')); ?>
            <?php echo $form->error($model,'location_id'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'program_id'); ?> 
            <?php echo $form->dropDownList($model, 'program_id',$program_list,array('prompt' => '------------ กรุณาเลือกสาขา ------------')); ?> (กรุณาอ่านรายละเอียดจากหน้าเว็บ)
            <?php echo $form->error($model,'program_id'); ?>
        </div>
        
    </div>
    <br/>
    <h3>ประวัติส่วนตัว</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        <div style="float:left;margin-right: 20px;">
            <div class="row">
                <?php echo $form->labelEx($model,'firstname_th'); ?> 
                <?php echo $form->textField($model,'firstname_th',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'firstname_th'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'firstname_en'); ?> 
                <?php echo $form->textField($model,'firstname_en',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'firstname_en'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'title'); ?> 
                <?php echo $form->dropDownList($model, 'title', array(''=>'--- เลือกคำนำหน้า ---','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว','ยศ.'=>'ยศ.')); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'address'); ?> 
                <?php echo $form->textArea($model,'address',array('rows'=>3, 'cols'=>35)); ?>
                <?php echo $form->error($model,'address'); ?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'postcode'); ?> 
                <?php echo $form->textField($model,'postcode',array('size'=>20,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'postcode'); ?>
            </div>  
            <div class="row">
                <?php echo $form->labelEx($model,'mobile_phone'); ?> 
                <?php echo $form->textField($model,'mobile_phone',array('size'=>20,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'mobile_phone'); ?>
            </div>               
             
        </div>
        
        <div style="float:left">
            <div class="row">
                <?php echo $form->labelEx($model,'lastname_th'); ?> 
                <?php echo $form->textField($model,'lastname_th',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'lastname_th'); ?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'lastname_en'); ?> 
                <?php echo $form->textField($model,'lastname_en',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'lastname_en'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'birthday'); ?> 
                <?php
                    $day =  date("d");
                    $month =  date("m");
                    $year = date("Y")+543;
                    $today = $day.'/'.$month.'/'.$year;

                  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'Admission[birthday]',
                    'language'=>'th',
                    'value' => $today,
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
                <?php echo $form->error($model,'birthday'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'district'); ?> 
                <?php echo $form->textField($model,'district',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'district'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'amphur'); ?> 
                <?php echo $form->textField($model,'amphur',array('size'=>40,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'amphur'); ?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'province'); ?> 
                <?php echo $form->textField($model,'province',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'province'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'email'); ?> 
                <?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'email'); ?>
            </div>             
            <div class="row">
                <?php echo $form->labelEx($model,'home_phone'); ?> 
                <?php echo $form->textField($model,'home_phone',array('size'=>20,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'home_phone'); ?>
            </div>               
              
           
        </div>        
    </div>
    <br/>
    <h3>ประวัติการศึกษา</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        1. โปรดระบุโดยเริ่มจากปริญญาสุดท้ายที่ได้รับจนถึงมัธยมศึกษาตอนปลายหรือเทียบเท่า<br/>
            <table  class="tb1" border="0" width="100%"  cellpadding="10" cellspacing="5">
                <tr>
                    <td align="center" valign="middle">ปีที่สำเร็จ<br/>การศึกษา</td>
                    <td align="center" valign="middle">ชื่อสถานศึกษา</td>
                    <td align="center" valign="middle">สาขาหรือวิชาเอก</td>
                    <td align="center" valign="middle">ชื่อปริญญา</td>
                    <td align="center" valign="middle">เกรดเฉลี่ย</td>
                </tr>
                <tr>
                    <td><?php echo $form->textField($model,'year_end_1',array('size'=>10,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'university_1',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'major_1',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'degree_1',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'score_1',array('size'=>10,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->textField($model,'year_end_2',array('size'=>10,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'university_2',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'major_2',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'degree_2',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'score_2',array('size'=>10,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->textField($model,'year_end_3',array('size'=>10,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'university_3',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'major_3',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'degree_3',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'score_3',array('size'=>10,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->textField($model,'year_end_4',array('size'=>10,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'university_4',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'major_4',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'degree_4',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'score_4',array('size'=>10,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->textField($model,'year_end_5',array('size'=>10,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'university_5',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'major_5',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'degree_5',array('size'=>40,'maxlength'=>255)); ?></td>
                    <td><?php echo $form->textField($model,'score_5',array('size'=>10,'maxlength'=>255)); ?></td>
                </tr>
            </table><br/>
            2. หลักสูตรฝึกอบรมระดับผู้บริหารที่ท่านเคยเข้ารับการอบรม<br/>
            <table class="tb1" border=0>
                <tr>
                    <td>2.1 <?php echo $form->textField($model,'training_1',array('size'=>80,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td>2.2 <?php echo $form->textField($model,'training_2',array('size'=>80,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td>2.3 <?php echo $form->textField($model,'training_3',array('size'=>80,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td>2.4 <?php echo $form->textField($model,'training_4',array('size'=>80,'maxlength'=>255)); ?></td>
                </tr>
                <tr>
                    <td>2.5 <?php echo $form->textField($model,'training_5',array('size'=>80,'maxlength'=>255)); ?></td>
                </tr>
            </table>
    </div>
    <br/>
    <h3>ประวัติการทำงาน</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        1. ประวัติการรับราชการหรือการทำงานโดยสรุป<br/>
           <div class="row">
               <label>&nbsp;</label>
                <?php echo $form->textArea($model,'work_experience',array('rows'=>3, 'cols'=>35)); ?>
                <?php echo $form->error($model,'work_experience'); ?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'career'); ?> 
                <?php echo $form->textField($model,'career',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'career'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'position'); ?> 
                <?php echo $form->textField($model,'position',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'position'); ?>
            </div>               
            <div class="row">
                <?php echo $form->labelEx($model,'level'); ?> 
                <?php echo $form->textField($model,'level',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'level'); ?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'salary'); ?> 
                <?php echo $form->textField($model,'salary',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'salary'); ?>
            </div>
            <div class="row">
                <label style="text-align: left;">2. ระยะเวลาในการทำงาน </label>
                <?php echo $form->textField($model,'period',array('size'=>5,'maxlength'=>255)); ?> ปี
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'company_name'); ?> 
                <?php echo $form->textField($model,'company_name',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_name'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'company_add'); ?> 
                <?php echo $form->textField($model,'company_add',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_add'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'company_road'); ?> 
                <?php echo $form->textField($model,'company_road',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_road'); ?>
            </div>        
            <div class="row">
                <?php echo $form->labelEx($model,'company_district'); ?> 
                <?php echo $form->textField($model,'company_district',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_district'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'company_amphur'); ?> 
                <?php echo $form->textField($model,'company_amphur',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_amphur'); ?>
            </div>   
            <div class="row">
                <?php echo $form->labelEx($model,'company_province'); ?> 
                <?php echo $form->textField($model,'company_province',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_province'); ?>
            </div>     
            <div class="row">
                <?php echo $form->labelEx($model,'company_postcode'); ?> 
                <?php echo $form->textField($model,'company_postcode',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_postcode'); ?>
            </div>     
            <div class="row">
                <?php echo $form->labelEx($model,'company_phone'); ?> 
                <?php echo $form->textField($model,'company_phone',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_phone'); ?>
            </div>     
            <div class="row">
                <?php echo $form->labelEx($model,'company_department'); ?> 
                <?php echo $form->textField($model,'company_department',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'company_department'); ?>
            </div>     
    </div>	
    <br/>
    <h3>การรับรอง</h3> 
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        บุคคลที่สามารถให้การรับรองเกี่ยวกับตัวท่านโปรดระบุ 3 ท่าน <br/>
        <div style="float: left">
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_1'); ?> 
                <?php echo $form->textField($model,'ref_name_1',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_name_1'); ?>
            </div>  
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_1'); ?> 
                <?php echo $form->textField($model,'ref_company_1',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_company_1'); ?>
            </div><br/>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_2'); ?> 
                <?php echo $form->textField($model,'ref_name_2',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_name_2'); ?>
            </div>  
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_2'); ?> 
                <?php echo $form->textField($model,'ref_company_2',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_company_2'); ?>
            </div><br/>    
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_3'); ?> 
                <?php echo $form->textField($model,'ref_name_3',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_name_3'); ?>
            </div>  
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_3'); ?> 
                <?php echo $form->textField($model,'ref_company_3',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_company_3'); ?>
            </div>                
        </div>
        <div style="float: left">
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_1'); ?> 
                <?php echo $form->textField($model,'ref_position_1',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_position_1'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_1'); ?> 
                <?php echo $form->textField($model,'ref_phone_1',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_phone_1'); ?>
            </div><br/>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_2'); ?> 
                <?php echo $form->textField($model,'ref_position_2',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_position_2'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_2'); ?> 
                <?php echo $form->textField($model,'ref_phone_2',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_phone_2'); ?>
            </div><br/> 
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_3'); ?> 
                <?php echo $form->textField($model,'ref_position_3',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_position_3'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_3'); ?> 
                <?php echo $form->textField($model,'ref_phone_3',array('size'=>40,'maxlength'=>255)); ?>                
                <?php echo $form->error($model,'ref_phone_3'); ?>
            </div> 
         </div>
    </div>
    <br/>
    <h3>การประเมินตัวเองและความคาดหวัง</h3> 
    <div style="border: 1px solid #0b75b2;padding: 10px;">
           1. ผลงานที่ท่านประสบความสำเร็จในการทำงานมากที่สุด คืออะไร<br/>
           <div class="row">
                <?php echo $form->textArea($model,'succeed',array('rows'=>7, 'cols'=>80)); ?>
                <?php echo $form->error($model,'succeed'); ?>
           </div>  
           2. สาเหตุที่ท่านสนใจศึกษาต่อในหลักสูตรรัฐประศาสนศาสตรมหาบัณฑิต<br/>
           <div class="row">
                <?php echo $form->textArea($model,'reason',array('rows'=>7, 'cols'=>80)); ?>
                <?php echo $form->error($model,'reason'); ?>
           </div>
           3. เป้าหมายในอนาคตที่ท่านต้องการทำหลังจากสำเร็จการศึกษาตามหลักสูตรนี้แล้ว<br/>
           <div class="row">
                <?php echo $form->textArea($model,'goal',array('rows'=>7, 'cols'=>80)); ?>
                <?php echo $form->error($model,'goal'); ?>
           </div>             
        
    </div> 
    <br/>
    <div align="center">
        <p>ข้าพเจ้าขอร้บรองว่า ข้าพเจ้ามีคุณสมบัติตรงตามประกาศรับสมัครจริง 
                    <br>และข้อความที่ได้แจ้งไว้ในใบสมัครถูกต้องตามความเป็นจริงทุกประการ</p>
        <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'สมัคร' : 'บันทึกข้อมูล'); ?>&nbsp;&nbsp;
                <?php echo CHtml::resetButton('เขียนใหม่'); ?>
        </div>
        <br/>
        <p style="color: red">* คำแนะนำ โปรดกรอกข้อมูลให้ครบถ้วนสมบูรณ์ เพื่อประโยชน์ต่อการพิจารณาของคณะกรรมการ</p>
    </div>

    <?php $this->endWidget(); ?>
    </div>
    <?php endif; ?> 
    </div>
  </div>
</div>