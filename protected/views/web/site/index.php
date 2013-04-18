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
          <li> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slide/<?php echo $value->image;?>" alt="" /> <strong class="banner"> <a class="close" href="#">x</a> <span><?php echo $value->title_en;?></span> <b class="margin-bot"><?php echo $value->desc_en;?></b> <a class="button2" href="#">Read More</a> </strong> </li>
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
      <h2>Graduate School of Public Administration<strong>Burapha University</strong></h2>
    </div>
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('leftmenu');?>
        </div>
      </article>
      <article class="col-2">
         <h3>ข่าวล่าสุด</h3>  
        <?php foreach ($news as $new){?>
        <h4><?php echo $new->name_th;?></h4>
        <div class="p1">
          <figure class="img-border"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->image;?>" alt="" /></figure>
          <div class="clear"></div>
        </div>
        <p class="img-indent-bot"><?php echo $new->title_th;?></p>
        <?php }?>
        <a class="button" href="<?php echo Yii::app()->createUrl('news'); ?>">ข่าวทั้งหมด</a>
      </article>
      <article class="col-3">
        <div class="indent-top">
        <h3>Media</h3>
        <script type="text/javascript">
AC_AX_RunContent( 'width','310','src','http://www.youtube.com/v/sME2Vshjnow?version=3&hl=th_TH','type','application/x-shockwave-flash','allowscriptaccess','always','allowfullscreen','true','movie','http://www.youtube.com/v/sME2Vshjnow?version=3&hl=th_TH' ); //end AC code
</script><noscript><object width="310"><param name="movie" value="http://www.youtube.com/v/sME2Vshjnow?version=3&amp;hl=th_TH"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/sME2Vshjnow?version=3&amp;hl=th_TH" type="application/x-shockwave-flash" width="310" allowscriptaccess="always" allowfullscreen="true"></embed></object></noscript><br>
        <div class="clear"></div>
          <ul class="list-2">
            <li> <a class="item" href="#">Our Vision</a> <span>Business.Co is one of free web templates created by TemplateMonster.com team. </span> </li>           
            <li> <a class="item" href="#">Perfect Experience</a> <span>This template is optimized for 1280X1024 screen resolution.</span> </li>
            <li class="last-item"> <a class="item" href="#">News &amp; Events</a> <span>It is also XHTML &amp; CSS valid. Quis nostrud exercitation ullamco laboris nisi ut.</span> <a class="button" href="#">Read More</a> </li>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>