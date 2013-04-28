<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- Top Banner -->
<section id="content">
  <div class="main">
    <div class="slider-wrapper">
      <div class="slider">
        <ul class="items">
          <?php foreach ($model as $value){?> 
          <li> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slide/<?php echo $value->image;?>" alt="" /> <strong class="banner"> <a class="close" href="#">x</a> <span><?php echo $value->title_en;?></span> <b class="margin-bot"><?php echo $value->desc_en;?></b> <a class="button2" href="<?php echo $value->link_th;?>">Read More</a> </strong> </li>
          <?php }?>
        </ul>
      </div>
      <ul class="pagination">
        <?php 
         $loop =1;
         foreach ($model as $value){
             if($loop==1){
                 $item = "item-1";
             }
             if($loop==2){
                 $item = "item-2";
             }
             if($loop==3){
                 $item = "item-3";
             }
             if($loop==4){
                 $item = "item-4";
             }
         ?>
        <li><a class="<?php echo $item;?>" href="<?php echo $value->link_en;?>"><strong><?php echo $loop;?></strong></a></li>
        <?php $loop++; }?>
      </ul>
    </div>
    <div class="border-bot1 img-indent-bot">
      <h2>&#126; วิทยาลัยการบริหารรัฐกิจ มหาวิทยาลัยบูรพา &#126;</h2>
    </div>
    <div class="wrapper">
      <article class="col-2">
         <h3>ข่าวล่าสุด</h3>  
        <?php foreach ($news as $new){?>
        <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?></a></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;"><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->image;?>" title="<?php echo $new->name_th;?>" alt="" border="0" width="209" /></a></figure>
          <p class="img-indent-bot"><?php echo $new->title_th;?></p>
        </div>
        
        <div class="clear"></div>
        <?php }?>
        <div class="alignright">
        <a class="button" href="<?php echo Yii::app()->createUrl('news'); ?>">ดูข่าวทั้งหมด</a>
        </div>
      </article>
      <article class="col-3">
        <div class="indent-top">
        <h3>วีดีโอแนะนำวิทยาลัย</h3>
        <?php echo $vdo->desc_th;?>
        <div class="clear"></div>
        <br/>
        <h4>ประมวลภาพกิจกรรมล่าสุด</h4>
          <ul class="list-2">
            <li> <a class="item" href="#">Our Vision</a> <span>Business.Co is one of free web templates created by TemplateMonster.com team. </span> </li>           
            <li> <a class="item" href="#">Perfect Experience</a> <span>This template is optimized for 1280X1024 screen resolution.</span> </li>
            <li class="last-item"> <a class="item" href="#">News &amp; Events</a> <span>It is also XHTML &amp; CSS valid. Quis nostrud exercitation ullamco laboris nisi ut.</span> <a class="button" href="#">ดูทั้งหมด</a> </li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>