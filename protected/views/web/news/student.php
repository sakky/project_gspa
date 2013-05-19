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
               <li><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $name;?></a></li>         
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