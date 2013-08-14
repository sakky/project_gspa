<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    if($model->ser_group ==1){
        $type = "Master's degree";
        $link = "group1";
    }
    if($model->ser_group ==2){
        $type = "Doctorate Degree";
        $link = "group2";
    }
    if($model->ser_group ==3){
        $type = "Evaluation of Teaching";
        $link = "group3";
    }
    $this->pageTitle='Graduate School of Public Administration - Service for Student';
     if($model->ser_group ==4){
        $this->breadcrumbs=array(
            'Service for Student'=>array('index'),
            $model->serType->name_en=>array('index','type_id'=>$model->ser_type_id),
            $model->name_en
        );
    }else{
        $this->breadcrumbs=array(
            'Service for Student'=>array('index'),
            $type=>array($link),
            $model->serType->name_en=>array('index','type_id'=>$model->ser_type_id),
            $model->name_en
        );
    }

    $header = "Service for Student";

}else{
    if($model->ser_group ==1){
        $type = "ปริญญาโท";
        $link = "group1";
    }
    if($model->ser_group ==2){
        $type = "ปริญญาเอก";
        $link = "group2";
    }
    if($model->ser_group ==3){
        $type = "ประเมินการเรียนการสอน";
        $link = "group3";
    }
    $this->pageTitle=Yii::app()->name. ' - บริการนิสิต';
   if($model->ser_group ==4){
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                $model->serType->name_th=>array('index','type_id'=>$model->ser_type_id),
                $model->name_th
        );
    }else{
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                $type=>array($link),
                $model->serType->name_th=>array('index','type_id'=>$model->ser_type_id),
                $model->name_th
        );    
    }

    $header = "บริการนิสิต";

}
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $model->name_en;
                       $desc = $model->desc_en;
                       $pdf = $model->pdf_en;
                   }else{
                       $name = $model->name_th;
                       $desc = $model->desc_th;
                       $pdf = $model->pdf_th;
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
          <h3><?php echo $name;?></h3>
          <div><?php echo $desc;?></div>
          <?php if($pdf){?>
          <div align="right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/pdf.png"/> <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/documents/<?php echo $pdf;?>">ดาวน์โหลดไฟล์ pdf คลิกที่นี่</a></div>
          <?php }?>
      </article>
      
    </div>
  </div>
</div>