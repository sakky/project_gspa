<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name. ' - หลักสูตรที่เปิดสอน';
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
          <h3>หลักสูตรที่เปิดสอน</h3>
          <h4>หลักสูตรปริญาโท</h4>
            <ul class="list-4">
                <?php foreach ($master as $value){?>
                    <li><a href="<?php echo Yii::app()->createUrl('site/program', array('id'=>$value->program_id)); ?>"><?php echo $value->name_th;?></a></li>
                <?php }?>
            </ul>
          
          <h4>หลักสูตรปริญาเอก</h4>
             <ul class="list-4">
                <?php foreach ($doctor as $value2){?>
                    <li><a href="<?php echo Yii::app()->createUrl('site/program', array('id'=>$value->program_id)); ?>"><?php echo $value2->name_th;?></a></li>
                <?php }?>
             </ul>
        </article>
      
    </div>
  </div>
</section>
</div>