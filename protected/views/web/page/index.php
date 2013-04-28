<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name. ' - '.$model->name_th;
?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('/site/leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <h3><?php echo $model->name_th;?></h3>
          <div><?php echo $model->desc_th;?></div>
          <?php if($model->page_id == 14 ||$model->page_id == 15){?>
          <div align="right"><a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/pages/pdf/<?php echo $model->pdf_th;?>">ดาวโหลดใบสมัครที่นี่</a></div>
          <?php }?>
      </article>     
    </div>
  </div>
</div>