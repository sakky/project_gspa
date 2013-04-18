<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - About Us';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - เกี่ยวกับเรา';
    
}


?>
<div id="page6">
<section id="content" style="margin-top: -20px">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
            
            <ul class="list-1">
                    <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about','id'=>1)); ?>">เกี่ยวกับวิทยาลัย</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about','id'=>2)); ?>">สัญลักษณ์ประจำวิทยาลัย</a></li>
                    <li><a href="#">คณะกรรมการประจำวิทยาลัย</a></li>
                    <li><a href="#">ผู้บริหารวิทยาลัยการบริหารรัฐกิจ</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about','id'=>4)); ?>">โครงสร้างองค์กร</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about','id'=>5)); ?>">ความร่วมมือทางวิชาการ</a></li>     
                    <li class="last-item"><a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'about','id'=>6)); ?>">แผนที่วิทยาลัย</a></li>           
            </ul>
        </div>
      </article>
      <article class="col-2">
          <h3>แนะนำวิทยาลัย</h3>
          <h4><?php echo $model->name_th;?></h4>
          <div><?php echo $model->desc_th;?></div>
        </article>
      
    </div>
  </div>
</section>
</div>