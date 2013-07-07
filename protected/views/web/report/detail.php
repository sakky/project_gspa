<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Report';
    $this->breadcrumbs=array(
            'Report'=>array('index'),
            $model->reportType->name_en=>array('index','type_id'=>$model->report_type_id),
            $model->name_en
    );
    $header = "Report";

}else{
    $this->pageTitle=Yii::app()->name. ' - รายงานผลการดำเนินงาน';
    $this->breadcrumbs=array(
            'รายงานผลการดำเนินงาน'=>array('index'),
            $model->reportType->name_th=>array('index','type_id'=>$model->report_type_id),        
            $model->name_th
    );
    $header = "รายงานผลการดำเนินงาน";

}
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $model->name_en;
                       $pdf = $model->pdf_en;
                       $desc = $model->desc_en;
                   }else{
                       $name = $model->name_th;
                       $pdf = $model->pdf_th;
                       $desc = $model->desc_th;
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