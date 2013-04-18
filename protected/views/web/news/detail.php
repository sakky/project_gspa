<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - ข่าวสาร';;
?>
<div id="page6">
<section id="content" style="margin-top: -20px">
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
          <div align="right"><a href="<?php echo Yii::app()->createUrl('news'); ?>">ย้อนกลับหน้าข่าวรวม</a></div>
      </article>
      
    </div>
  </div>
</section>
</div>
