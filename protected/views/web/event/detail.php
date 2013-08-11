<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Event Calendar';

    $name = $model->event_title_en;
    $event_location = $model->location_en;
    $this->breadcrumbs=array(
            'Event Calendar'=>array('index'),
            $model->event_title_en,
    );
    $title = 'Activity';   
    $link = 'Link';  
    $date = 'Date';
    $location = 'Place';

}else{
    $this->pageTitle=Yii::app()->name. ' - ปฏิทินกิจกรรม';

    $name = $model->event_title_th;
    $event_location = $model->location_th;
    $this->breadcrumbs=array(
            'ปฏิทินกิจกรรม'=>array('index'),
            $model->event_title_th,
    );
    $title = 'กิจกรรม';   
    $link = 'ลิงค์ที่เกี่ยวข้อง';  
    $date = 'วันที่';
    $location = 'สถานที่';
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
          <h3><?php echo $title. " : ".$name;?></h3>
          <h4><?php echo $date. " : ".$name;?></h4>
          <h4><?php echo $location. " : ".$event_location;?></h4>
          <h4><?php echo $link. " : ".$model->event_url;?></h4>

    </article>      
    </div>
  </div>
</div>
