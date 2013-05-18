<?php
/* @var $this SiteController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle="Graduate School of Public Administration";
    $col2_header = "News & Events";
    $col3_header = "Media";
    $col3_2_header = "Announce";
    $col3_3_header = "Job News";
}else{
    $this->pageTitle=Yii::app()->name;
    $col2_header = "ข่าวสารและกิจกรรม";  
    $col3_header = "วีดีโอแนะนำวิทยาลัย";
    $col3_2_header = "ประกาศ";
    $col3_3_header = "ข่าวรับสมัครงาน";
}
?>

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
        <h4><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $new->name_th;?></a></h4>
        <div class="p1">
          <figure class="img-border" style="margin-right:10px;">
              <a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">
                  <img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>" <?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture.png"<?php }?> title="<?php echo $news_name;?>" alt="" border="0" width="209" />
              </a>
          </figure>
          <p class="img-indent-bot"><?php echo $news_title;?></p>
        </div>
        
        <div class="clear"></div>
        <?php }?>
        <div class="alignright">
        <a class="button" href="<?php echo Yii::app()->createUrl('news'); ?>"><?php echo $news_readmore;?></a>
        </div>
      </article>
      <article class="col-3">
        <div class="indent-top">
        <h3><?php echo $col3_header;?></h3>
        <?php echo $vdo->desc_th;?>
        <div class="clear"></div>
        <br/>
        <h3><?php echo $col3_2_header;?></h3>
          <ul class="list-2">
        <?php 
            $count_news = -1;
            foreach ($news_ads as $key_new => $new){?>
            <li><a href="#"><?php echo $new->name_th;?></a></li>
        <?php }?>
          </ul>
        <h3><?php echo $col3_3_header;?></h3>
          <ul class="list-2">
        <?php 
            foreach ($job as $key_new => $new){?>
            <li><a href="#"><?php echo $new->name_th;?></a> </li>
        <?php }?>
          </ul>
        </div>
      </article>
    </div>
  </div>
</section>