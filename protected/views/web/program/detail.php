<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    if($model->program_type == 'Master'){
        $group = "Master's Degree Programs";
        $url = "master";
    }else{
        $group = "Doctorate Degree Programs";
        $url = "doctor";
    }
    $this->pageTitle='Graduate School of Public Administration - Programs';
    $this->breadcrumbs=array(
        'Programs'=>array('index'),
         $group=>array($url),
         $model->name_en,

    );
    $header = "Programs";



 
}else{
    if($model->program_type == 'Master'){
        $group = "ปริญญาโท";
        $url = "master";
    }else{
        $group = "ปริญญาเอก";
        $url = "doctor";
    }    
    $this->pageTitle=Yii::app()->name . ' - หลักสูตรที่เปิดสอน';
    $this->breadcrumbs=array(
        'หลักสูตรที่เปิดสอน'=>array('index'),
         $group=>array($url),
         $model->name_th,
    );
    $header = "หลักสูตรที่เปิดสอน";



}

?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
          <h3><?php echo $model->name_th;?></h3>
          <div><?php echo $model->desc_th;?></div>
          <?php if($model->pdf_th){?>
          <div align="right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/pdf.png"/> <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/programs/<?php echo $model->pdf_th;?>">ดาวน์โหลดไฟล์ pdf คลิกที่นี่</a></div>
          <?php }?>
      </article>
      
    </div>
  </div>
</div>