<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Download';
    $this->breadcrumbs=array(
            'Download'=>array('index'),
            $model->documentType->name_en=>array('type','id'=>$model->doc_type_id),
            $model->name_en
    );
    $header = "Download";

}else{
    $this->pageTitle=Yii::app()->name. ' - สื่อเผยแพร่/ดาวน์โหลด';
    $this->breadcrumbs=array(
            'สื่อเผยแพร่/ดาวน์โหลด'=>array('index'),
            $model->documentType->name_th=>array('type','id'=>$model->doc_type_id),
            $model->name_th
    );
    $header = "สื่อเผยแพร่/ดาวน์โหลด";

}
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $model->name_en;
                       $pdf = $model->pdf_en;
                       $desc = $model->desc_en;
                       $updated = date('d M Y',strtotime($model->last_update));
                   }else{
                       $name = $model->name_th;
                       $pdf = $model->pdf_th;
                       $desc = $model->desc_th;
                       $updated = $this->thai_date(strtotime($model->last_update));
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