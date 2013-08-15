<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Event Calendar';
    $this->breadcrumbs=array(
            'Event Calendar',
    );
    $header = "Event Calendar";
    $event_title ="Activity";
    $event_date ="Date";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name. ' - ปฏิทินกิจกรรม';
    $this->breadcrumbs=array(
            'ปฏิทินกิจกรรม',
    );
    $header = "ปฏิทินกิจกรรม";
    $event_title ="กิจกรรม";
    $event_date ="วันที่";
    $readmore = "อ่านต่อ...";
}
?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('/news/leftmenu');?>
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
          <?php foreach ($model as $event){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                  $event_name = $event->event_title_en;
              }else{
                  $event_name = $event->event_title_th;
              }
          ?>
               <div class="date-event">
                        <h5><?php echo date('M',  strtotime($value->event_start));?></h5>
                        <h3><?php echo date('j',  strtotime($value->event_start));?></h3>
               </div>
               <div class="date-detile">
                    <a href="<?php echo Yii::app()->createUrl('event', array('id'=>$event->event_id)); ?>"><?php echo $event_title;?> : <?php echo $event_name;?><br/><?php echo $event_date;?> : <?php echo date('d/m/Y',  strtotime($event->event_start));?><?php if($event->event_end && $event->event_end != '0000-00-00'){ echo " - ".date('d/m/Y',  strtotime($event->event_end)); }?></a>
               </div>
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