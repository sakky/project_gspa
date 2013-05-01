<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name. ' - ข่าวประชาสัมพันธ์นิสิต';
?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('leftmenu');?>
        </div>
      </article>
      <article class="col-2">
          <h3>ข่าวประชาสัมพันธ์นิสิต</h3>
          
          <?php foreach ($news as $new){?>
          <div class="wrapper margin-bot">
          <div class="prev-indent-bot" style="float:left">
            <figure class="img-border"><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><img <?php if($new->image){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->image;?>"<?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture2.png"<?php }?> alt="" width="290px" /></a></figure>
            <div class="clear"></div>
          </div>
          <div style="float:left;width:300px;margin-left:10px;">
          <h6><?php echo $new->name_th;?></h6>
          <p class="p2"><?php echo $new->title_th;?></p>
          <a class="button" href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>">อ่านต่อ...</a> 
          </div>
          <div class="clear"></div>
          </div>
          <?php }?>
         
      </article>     
    </div>
  </div>
</div>