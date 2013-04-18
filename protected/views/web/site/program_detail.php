<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - หลักสูตรที่เปิดสอน';;
?>
<div id="page6">
<section id="content" style="margin-top: -20px">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <h3><?php echo $model->name_th;?></h3>
          <div><?php echo $model->desc_th;?></div>
          <div align="right"><a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/programs/<?php echo $model->pdf_th;?>">ดาวน์โหลดไฟล์ pdf คลิกที่นี่</a></div>
      </article>
      
    </div>
  </div>
</section>
</div>