<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Academic Cooperation';
    $this->breadcrumbs=array(
            'About Us'=>array('about/index', 'id'=>'1'),
            'Academic Cooperation',
    );
    $header = "Academic Cooperation";
    $intro = "ด้วยวิสัยทัศน์อันยาวไกลที่มุ่งมั่น สร้างองค์ความรู้ใหม่ที่เป็นเอกลัษณ์ของภูมิภาคแล้ว วิทยาลัย การบริหารรัฐกิจยังก้าวไกล ไปสู่ความร่วมมือทางวิชาการกับหน่วยงานอื่นๆ ทั้งภายในประเทศ และต่างประเทศ ดังนี้";

}else{
    $this->pageTitle=Yii::app()->name. ' - ความร่วมมือทางวิชาการ';
    $this->breadcrumbs=array(
            'เกี่ยวกับเรา'=>array('about/index', 'id'=>'1'),
            'ความร่วมมือทางวิชาการ',
    );
    $header = "ความร่วมมือทางวิชาการ";
    $intro = "ด้วยวิสัยทัศน์อันยาวไกลที่มุ่งมั่น สร้างองค์ความรู้ใหม่ที่เป็นเอกลัษณ์ของภูมิภาคแล้ว วิทยาลัย การบริหารรัฐกิจยังก้าวไกล ไปสู่ความร่วมมือทางวิชาการกับหน่วยงานอื่นๆ ทั้งภายในประเทศ และต่างประเทศ ดังนี้";
}


?>

<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('/about/about_menu');?>
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
          <h3><?php echo $header;?></h3>
          <div><?php echo $intro;?></div>
          <ul class="list-4">
              <?php foreach ($model as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
               ?>
              <li><a href="<?php echo Yii::app()->createUrl('cooperation', array('id'=>$value->co_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
        </article>
      
    </div>
  </div>
</div>