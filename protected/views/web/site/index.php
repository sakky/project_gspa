<?php
/* @var $this SiteController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration";
    $col1_header = "GSPA News & Activities";
    $col2_header = "News & Activities";  
    $col3_header = "Media";
    $col3_2_header = "Admission";
    $col3_3_header = "Job News";
    $col3_4_header = "Link";

}else{
    $this->pageTitle=Yii::app()->name;
    $col1_header = "ประชาสัมพันธ์/กิจกรรม ภายใน"; 
    $col2_header = "ประชาสัมพันธ์/กิจกรรม จากสื่อ";  
    $col3_header = "วีดีโอแนะนำวิทยาลัย";
    $col3_2_header = "ประกาศสมัครเรียน";
    $col3_3_header = "ประกาศรับสมัครงาน";
    $col3_4_header = "ลิงค์ที่เกี่ยวข้อง";
}
?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/FF-cash.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms-0.3.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms_presets.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $('.close').bind('click', function () {
        $(this).parent().show().fadeOut(500);
    });
});
</script>
<script type="text/javascript">
$(window).load(function () {
    $('.slider')._TMS({
        duration: 800,
        easing: 'easeOutQuart',
        preset: 'diagonalExpand',
        slideshow: 7000,
        pagNums: false,
        pagination: '.pagination',
        banners: 'fade',
        pauseOnHover: true,
        waitBannerAnimation: true
    });
});
</script>

<!-- Top Banner -->
<section id="content">
  <div class="main">
    <div class="slider-wrapper">
      <div class="slider">
        <ul class="items">
          <?php foreach ($model as $value){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $link = $value->link_en;
                  $title = $value->title_en;
                  $desc = $value->desc_en;
                  $readmore = "Read More";
              }else{
                  $link = $value->link_th;
                  $title = $value->title_th;
                  $desc = $value->desc_th;
                  $readmore = "อ่านต่อ...";
              }
              
              ?> 
                <li> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slide/<?php echo $value->image;?>" alt="" /> <strong class="banner"> <a class="close" href="#">x</a> <span><?php echo $title;?></span> <b class="margin-bot"><?php echo $desc;?></b> <a class="button2" href="<?php echo $link;?>"><?php echo $readmore;?></a> </strong> </li>
          <?php }?>
        </ul>
      </div>
      <ul class="pagination">
        <?php 
         $loop =1;
         foreach ($model as $value){
             if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $link = $value->link_en;
             }else{
                  $link = $value->link_th;
             }
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
        
            <li><a class="<?php echo $item;?>" href="<?php echo $link;?>"><strong><?php echo $loop;?></strong></a></li>
        
        <?php $loop++; }?>
      </ul>
    </div>
    <div class="border-bot1 img-indent-bot">
      <h2>&#126; <?php echo $this->pageTitle;?> &#126;</h2>
    </div>
    <div class="wrapper">
      <article class="col-2">
         <!-- ข่าวภายใน -------------------------------------------------------------------------------------------->
         <h3><?php echo $col1_header;?></h3>
         <?php foreach ($newsInSide as $new){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $news_name = $new->name_en;
                  $news_title = $new->title_en;
                  $news_readmore = "News More";
              }else{
                  $news_name = $new->name_th;
                  $news_title = $new->title_th;
                  $news_readmore = "ดูข่าวทั้งหมด";
              }
        ?>
        <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;">
              <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                  <? if ($new->vdo_link) { ?>
                  <iframe width="209" height="215" src="<?php echo $new->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                  <? } else { ?>
                  <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="209" />
                  <? } ?>
              </a>
          </figure>
          <p class="img-indent-bot"><?php echo $news_title;?></p>
        </div>       
        <div class="clear"></div>
        <?php }?>
        <div class="alignright" style="border-bottom:1px solid #aaa;padding-bottom: 10px;margin-bottom: 10px;">
        <a class="button" href="<?php echo Yii::app()->createUrl('news'); ?>"><?php echo $news_readmore;?></a>
        </div>
        <!-- ข่าวจากสื่อ -------------------------------------------------------------------------------------------->
         <h3><?php echo $col2_header;?></h3>  
        <?php foreach ($news as $new){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $news_name = $new->name_en;
                  $news_title = $new->title_en;
                  $news_readmore = "News More";
              }else{
                  $news_name = $new->name_th;
                  $news_title = $new->title_th;
                  $news_readmore = "ดูข่าวทั้งหมด";
              }
        ?>
        <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;">
              <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                  <? if ($new->vdo_link) { ?>
                  <iframe width="209" height="215" src="<?php echo $new->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                  <? } else { ?>
                  <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="209" />
                  <? } ?>
              </a>
          </figure>
          <p class="img-indent-bot"><?php echo $news_title;?></p>
        </div>
        
        <div class="clear"></div>
        <?php }?>
        <div class="alignright">
        <a class="button" href="<?php echo Yii::app()->createUrl('news/media'); ?>"><?php echo $news_readmore;?></a>
        </div>      
      </article>
      <article class="col-3">
        <div class="indent-top">
        <h3><?php echo $col3_header;?></h3>
        <iframe width="320" height="215" src="<?php echo $vdo->title_th;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
            
        <div class="clear"></div>
        <br/>
        <!-- ข่าวรับสมัครเรียน -->
        <h3><?php echo $col3_2_header;?></h3>
          <ul class="list-2">
            <?php 
                foreach ($student_news as $key_new => $new_pr){?>
                <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new_pr->news_id)); ?>"><?php echo $new_pr->name_th;?></a> </li>
            <?php }?>
          </ul>
    
        <!-- ข่าวรับสมัครงาน -->
        <h3><?php echo $col3_3_header;?></h3>
          <ul class="list-2">
            <?php 
                foreach ($job as $key_new => $new){?>
                <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?></a> </li>
            <?php }?>
          </ul>
        <!-- ลิงค์ที่เกี่ยวข้อง -->
        <h3><?php echo $col3_4_header;?></h3>
          <ul class="list-2">
            <?php 
                foreach ($links as $key=>$value){      
                    if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                        $url = $value->link_en;
                        $link_name = $value->name_en;
                    }else{
                        $url = $value->link_th;
                        $link_name = $value->name_th;
                    }?>
                <li><a href="<?php echo $url;?>"><?php echo $link_name;?></a> </li>
            <?php }?>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>