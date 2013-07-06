<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Announcement';
    $this->breadcrumbs=array(
            'Announcement',
    );
    $header = "Announcement";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name. ' - ประกาศ';
    $this->breadcrumbs=array(
            'ประกาศ',
    );
    $header = "ประกาศ";
    $readmore = "อ่านต่อ...";
}
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
          <ul class="list-2">
          <?php foreach ($news as $new){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $name = $new->name_en;
                  $title = $new->title_en;
              }else{
                  $name = $new->name_th;
                  $title = $new->title_th;
              }
          ?>
               <li><a href="<?php echo Yii::app()->createUrl('announce', array('id'=>$new->news_id)); ?>">[<?php echo $this->getThaiDate($new->create_date,'dmY');?>] <?php echo $name;?></a></li>         
          <?php }?>
          </ul>
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