<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - News & Activities';
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'News & Activities'=>array('index'),
                $type->name_en            
        );    
    }else if($_GET['group']){
        $this->breadcrumbs=array(
                'News & Activities'=>array('index'),
                $group->newsType->name_en=>array('index','type_id'=>$group->news_type_id),
                $group->name_en  
        );                                
    }else{
        $this->breadcrumbs=array(
                'News & Activities',
        );
    }     

    $header = "News & Activities";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name. ' - ประชาสัมพันธ์ & กิจกรรม';
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'ประชาสัมพันธ์ & กิจกรรม'=>array('index'),
                $type->name_th            
        );    
    }else if($_GET['group']){
        $this->breadcrumbs=array(
                'ประชาสัมพันธ์ & กิจกรรม'=>array('index'),
                $group->newsType->name_th=>array('index','type_id'=>$group->news_type_id),
                $group->name_th  
        );                                
    }else{
        $this->breadcrumbs=array(
                'ประชาสัมพันธ์ & กิจกรรม',
        );
    }     
    $header = "ประชาสัมพันธ์/กิจกรรม ";
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
          <?php foreach ($model as $new){
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
            <figure class="img-border"><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><img <?php if($new->thumbnail){?> src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $new->thumbnail;?>"<?php }else{ ?> src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no_picture2.png"<?php }?> alt="" <?php if ($new->news_type_id==4){ ?>height="150px"<?php } else { ?>width="250px" <?php }?> /></a></figure>
            <div class="clear"></div>
          </div>
          <div style="float:left;width:300px;margin-left:10px;">
          <h6><a href="<?php echo Yii::app()->createUrl('news', array('id'=>$new->news_id)); ?>"><?php echo $name;?> [<?php echo $this->getThaiDate($new->create_date,'dmY');?>]</a><?php echo $this->showIcon($new->news_icon);?></h6>
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