<style>
    
    div .row label{
        width: 150px;
        float: left;
        margin-right: 10px;
        text-align: right;
    }
    div .row{
        margin-bottom: 5px;
    } 
   th, td, caption {
        padding: 2px;
    }
</style>
<?php
/* @var $this AdmissionController */
/* @var $model Admission */

$this->breadcrumbs=array(
	'สมัครเรียนออนไลน์'=>array('index'),
	'ดูรายละเอียด',
);

$this->menu=array(
	//array('label'=>'List Admission', 'url'=>array('index')),
	//array('label'=>'Create Admission', 'url'=>array('create')),
	//array('label'=>'Update Admission', 'url'=>array('update', 'id'=>$model->admission_id)),
	//array('label'=>'Delete Admission', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->admission_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>

<h1>ดูข้อมูลสมัครเรียนออนไลน์ #<?php echo $model->admission_id; ?></h1>
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
    <div class="clear"></div>
    <div style="border: 1px solid #0b75b2;padding: 10px;">
        <div class="row">
            <label>สถานที่สมัครเรียน : </label>
            <?php echo $model->location->name; ?>
        </div>
        
        <div class="row">
            <label>สาขาที่สมัคร : </label>
            <?php echo $model->program->name; ?>
        </div>
        
    </div>
    <div class="clear"></div>
    <br/>
    <h3>ประวัติส่วนตัว</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;overflow: hidden">
            <div class="row">
                <label>ชื่อ-นามสกุล (ไทย) : </label>
                <?php echo $model->title;?>
                <?php echo $model->firstname_th; ?>
                <?php echo $model->lastname_th; ?>
            </div>            
            <div class="row">
                <label>Name - Surname : </label>
                <?php echo $model->firstname_en; ?>
                <?php echo $model->lastname_en; ?>
            </div>        
            <div class="row">
                <label>วัน/เดือน/ปีเกิด : </label>
                <?php
                    if($model->birthday && $model->birthday!= '0000-00-00'){
                       list($y,$m,$d) = explode("-",$model->birthday);
                       $birthday = $d."/".$m."/".($y+543);
                    }else{
                       $birthday = "";
                    }
               ?>
                <?php echo $birthday; ?> 
                
            </div>
            <div class="row">
                <label>ที่อยู่ปัจจุบัน : </label>                
                <?php echo nl2br($model->address); ?> 
            </div> 
            <div class="row">
                <label>ตำบล/แขวง : </label>                
                <?php echo $model->district; ?> 
            </div>
            <div class="row">
                <label>อำเภอ/เขต : </label>                
                <?php echo $model->amphur; ?> 
            </div> 
            <div class="row">
                <label>จังหวัด : </label>                
                <?php echo $model->province; ?> 
            </div> 
            <div class="row">
                <label>รหัสไปรษณีย์ : </label>                
                <?php echo $model->postcode; ?> 
            </div>  
            <div class="row">
                <label>โทรศัพท์มือถือ : </label>                
                <?php echo $model->mobile_phone; ?> 
            </div>  
            <div class="row">
                <label>โทรศัพท์บ้าน : </label>                
                <?php echo $model->home_phone; ?> 
            </div> 
            <div class="row">
                <label>อีเมล์ : </label>                
                <?php echo $model->email; ?> 
            </div>               
    </div>
    <br/>
    <h3>ประวัติการศึกษา</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;overflow: hidden">
        1. โปรดระบุโดยเริ่มจากปริญญาสุดท้ายที่ได้รับจนถึงมัธยมศึกษาตอนปลายหรือเทียบเท่า<br/>
            <table  class="tb1" border="0" width="100%"  cellpadding="3" cellspacing="3">
                <tr>
                    <td align="center" valign="middle">ปีที่สำเร็จ<br/>การศึกษา</td>
                    <td align="center" valign="middle">ชื่อสถานศึกษา</td>
                    <td align="center" valign="middle">สาขาหรือวิชาเอก</td>
                    <td align="center" valign="middle">ชื่อปริญญา</td>
                    <td align="center" valign="middle">เกรดเฉลี่ย</td>
                </tr>
                <tr>
                    <td><?php echo $model->year_end_1;?></td>
                    <td><?php echo $model->university_1;?></td>
                    <td><?php echo $model->major_1;?></td>
                    <td><?php echo $model->degree_1;?></td>
                    <td><?php echo $model->score_1;?></td>
                </tr>
                <tr>
                    <td><?php echo $model->year_end_2;?></td>
                    <td><?php echo $model->university_2;?></td>
                    <td><?php echo $model->major_2;?></td>
                    <td><?php echo $model->degree_2;?></td>
                    <td><?php echo $model->score_2;?></td>                    
                </tr>
                <tr>
                    <td><?php echo $model->year_end_3;?></td>
                    <td><?php echo $model->university_3;?></td>
                    <td><?php echo $model->major_3;?></td>
                    <td><?php echo $model->degree_3;?></td>
                    <td><?php echo $model->score_3;?></td>                    
                </tr>
                <tr>
                    <td><?php echo $model->year_end_4;?></td>
                    <td><?php echo $model->university_4;?></td>
                    <td><?php echo $model->major_4;?></td>
                    <td><?php echo $model->degree_4;?></td>
                    <td><?php echo $model->score_4;?></td>                    
                </tr> 
                <tr>
                    <td><?php echo $model->year_end_5;?></td>
                    <td><?php echo $model->university_5;?></td>
                    <td><?php echo $model->major_5;?></td>
                    <td><?php echo $model->degree_5;?></td>
                    <td><?php echo $model->score_5;?></td>                    
                </tr> 
            </table><br/>
            2. หลักสูตรฝึกอบรมระดับผู้บริหารที่ท่านเคยเข้ารับการอบรม<br/>
            <table class="tb1" border=0>
                <tr>
                    <td>2.1 <?php echo $model->training_1;?></td>
                </tr>
                <tr>
                    <td>2.2 <?php echo $model->training_2;?></td>
                </tr>
                <tr>
                    <td>2.3 <?php echo $model->training_3;?></td>
                </tr>
                <tr>
                    <td>2.4 <?php echo $model->training_4;?></td>
                </tr>
                <tr>
                    <td>2.5 <?php echo $model->training_5;?></td>
                </tr>
            </table>
    </div>
    <br/>
    <h3>ประวัติการทำงาน</h3>  
    <div style="border: 1px solid #0b75b2;padding: 10px;overflow: hidden">
        1. ประวัติการรับราชการหรือการทำงานโดยสรุป : <br/>
            <div class="row">
                <?php echo nl2br($model->work_experience);?>
            </div> 
            <div class="row">
                <label>อาชีพปัจจุบัน : </label>
                <?php echo $model->career;?>
            </div>
            <div class="row">
                <label>ตำแหน่ง : </label>
                <?php echo $model->position;?>
            </div>
            <div class="row">
                <label>ระดับ : </label>
                <?php echo $model->level;?>
            </div>
            <div class="row">
                <label>ขั้นเงินเดือน : </label>
                <?php echo $model->salary;?>
            </div>
            <div class="row">
                <label style="text-align: left;">2. ระยะเวลาในการทำงาน :</label>
                <?php echo $model->period;?>&nbsp; ปี
            </div>
            <div class="row">
                <label>สถานที่ทำงาน : </label>
                <?php echo $model->company_name;?>
            </div>
            <div class="row">
                <label>เลขที่ : </label>
                <?php echo $model->company_add;?>
            </div>
            <div class="row">
                <label>ถนน  : </label>
                <?php echo $model->company_road;?>
            </div>
            <div class="row">
                <label>ตำบล/แขวง  : </label>
                <?php echo $model->company_district;?>
            </div>
            <div class="row">
                <label>อำเภอ/เขต  : </label>
                <?php echo $model->company_amphur;?>
            </div>
            <div class="row">
                <label>จังหวัด : </label>
                <?php echo $model->company_province;?>
            </div>
            <div class="row">
                <label>รหัสไปรษณีย์  : </label>
                <?php echo $model->company_postcode;?>
            </div>
            <div class="row">
                <label>โทรศัพท์(ที่ทำงาน)  : </label>
                <?php echo $model->company_phone;?>
            </div>
            <div class="row">
                <label>(กรม/กอง/แผนก/งาน)   : </label>
                <?php echo $model->company_department;?>
            </div>          
    </div>	
    <br/>
    <h3>การรับรอง</h3> 
    <div style="border: 1px solid #0b75b2;padding: 10px;overflow: hidden">
        บุคคลที่สามารถให้การรับรองเกี่ยวกับตัวท่านโปรดระบุ 3 ท่าน <br/>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_1'); ?>
                <?php echo $model->ref_name_1;?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_1'); ?> 
                <?php echo $model->ref_position_1;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_1'); ?>
                <?php echo $model->ref_company_1;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_1'); ?> 
                <?php echo $model->ref_phone_1;?>
            </div><br/>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_2'); ?>
                <?php echo $model->ref_name_2;?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_2'); ?> 
                <?php echo $model->ref_position_2;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_2'); ?>
                <?php echo $model->ref_company_2;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_2'); ?> 
                <?php echo $model->ref_phone_2;?>
            </div><br/>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_name_3'); ?>
                <?php echo $model->ref_name_3;?>
            </div> 
            <div class="row">
                <?php echo $form->labelEx($model,'ref_position_3'); ?> 
                <?php echo $model->ref_position_3;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_company_3'); ?>
                <?php echo $model->ref_company_3;?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'ref_phone_3'); ?> 
                <?php echo $model->ref_phone_3;?>
            </div>           
    </div>
    <br/>
    <h3>การประเมินตัวเองและความคาดหวัง</h3> 
    <div style="border: 1px solid #0b75b2;padding: 10px;overflow: hidden">
           1. ผลงานที่ท่านประสบความสำเร็จในการทำงานมากที่สุด คืออะไร<br/>
           <div class="row">
                <?php echo nl2br($model->succeed);?>
           </div>  
           2. สาเหตุที่ท่านสนใจศึกษาต่อในหลักสูตรรัฐประศาสนศาสตรมหาบัณฑิต<br/>
           <div class="row">
                <?php echo nl2br($model->reason);?>
           </div>
           3. เป้าหมายในอนาคตที่ท่านต้องการทำหลังจากสำเร็จการศึกษาตามหลักสูตรนี้แล้ว<br/>
           <div class="row">
                <?php echo nl2br($model->goal);?>
           </div>             
        
    </div> 
    <br/>
    <div align="center">      
        <div class="row buttons">
                <?php echo CHtml::Button('กลับหน้าหลัก', array('submit' => array('index'))); ?>
        </div>       
    </div>

    <?php $this->endWidget(); ?>