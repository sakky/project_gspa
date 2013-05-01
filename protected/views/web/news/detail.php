<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - ข่าวสาร';;
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
          <h4><?php echo $model->name_th;?></h4>
          <div><?php echo $model->desc_th;?></div>
          <?php if($model->pdf_th){?>
          <div align="right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/pdf.png"/> <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/programs/<?php echo $model->pdf_th;?>">ดูรายละเอียด</a></div>
          <?php }?>
          <br/>
          <div align="right"><a href="<?php echo Yii::app()->createUrl('news'); ?>"><h6>ย้อนกลับหน้าข่าวรวม</h6></a></div>
      </article>      
    </div>
  </div>
</div>
