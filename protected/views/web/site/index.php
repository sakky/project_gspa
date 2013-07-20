<?php Yii::app()->counter->refresh();?>
<?php
/* @var $this SiteController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration";
    $col1_header = "GSPA News & Activities";
    $col2_header = "News & Activities"; 
    $text_title = "Open Admissions Program";
    $text_button1 = "Master's degree";
    $text_button2 = "Doctorate Degree";
    $text_button3 = "Online Admission";

}else{
    $this->pageTitle=Yii::app()->name;
    $col1_header = "ประชาสัมพันธ์/กิจกรรม ภายใน"; 
    $col2_header = "ประชาสัมพันธ์/กิจกรรม จากสื่อ"; 
    $text_title = "เปิดรับสมัครนักศึกษา หลักสูตร";
    $text_button1 = "ปริญญาโท";
    $text_button2 = "ปริญญาเอก";
    $text_button3 = "สมัครเรียนออนไลน์";    
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
             if($loop==5){
                 $item = "item-1";
             }
         ?>
        
            <li><a class="<?php echo $item;?>" href="<?php echo $link;?>"><strong><?php echo $loop;?></strong></a></li>
        
        <?php $loop++; }?>
      </ul>
    </div>
    <div class="border-bot1 img-indent-bot" >
        <h2>~ <?php echo $text_title;?> ~</h2>
        <article class="fcol-1" style="text-align: center"><a href="#" class="button3"><?php echo $text_button1;?></a></article>
        <article class="fcol-2" style="text-align: center"><a href="#" class="button3 color2"><?php echo $text_button2;?></a></article>
        <article class="fcol-3" style="text-align: center"><a href="#" class="button3 color3"><?php echo $text_button3;?></a></article>
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
         <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a><?php echo $this->showIcon($new->news_icon);?></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;">
              <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                  <?php if ($new->vdo_link) { ?>
                  <iframe width="209" height="215" src="<?php echo $new->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                  <?php } else { ?>
                  <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="209" />
                  <?php } ?>
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
        <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a><?php echo $this->showIcon($new->news_icon);?></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;">
              <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                  <?php if ($new->vdo_link) { ?>
                  <iframe width="209" height="215" src="<?php echo $new->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                  <?php } else { ?>
                  <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="209" />
                  <?php } ?>
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
            <?php $this->renderPartial('rightmenu',array(
                                'newsInSide'=>$newsInSide,
                                'job'=>$job,
                                'student_news'=>$student_news,
                                'links'=>$links,
                                'vdo'=>$vdo,
                        ));?>
      </article>
    </div>
  </div>
</section>