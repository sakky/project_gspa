<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Student News';
    $this->breadcrumbs=array(
            'News'=>array('index'),
            'Student News'
    );
    $header = "Student News";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name. ' - ข่าวประชาสัมพันธ์นิสิต';
    $this->breadcrumbs=array(
            'ข่าวสาร'=>array('index'),
            'ข่าวประชาสัมพันธ์นิสิต',
    );
    $header = "ข่าวประชาสัมพันธ์นิสิต";
    $readmore = "อ่านต่อ...";
}

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
          <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
          <h3><?php echo $header;?></h3>
          <?php foreach ($news as $new){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $name = $new->name_en;
                  $title = $new->title_en;
              }else{
                  $name = $new->name_th;
                  $title = $new->title_th;
              }
          ?>
          <div class="wrapper margin-bot">
          <div class="prev-indent-bot" style="float:left">
            <figure class="img-border"><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><img <?php if($new->image){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->image;?>"<?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture2.png"<?php }?> alt="" width="290px" /></a></figure>
            <div class="clear"></div>
          </div>
          <div style="float:left;width:300px;margin-left:10px;">
          <h6><?php echo $name;?></h6>
          <p class="p2"><?php echo $title;?></p>
          <a class="button" href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $readmore;?></a> 
          </div>
          <div class="clear"></div>
          </div>
          <?php }?>
          <?php $this->widget('CLinkPager', array(
                    'currentPage'=>$pages->getCurrentPage(),
                    'pages' => $pages,
                    'maxButtonCount'=>5,
                    'htmlOptions'=>array('class'=>'pagenav'),
                    'header'=> '',
            )) ?>
      </article>     
    </div>
  </div>
</div>