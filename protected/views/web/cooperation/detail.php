<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Cooperation';
    $this->breadcrumbs=array(
        'Cooperation'=>array('index'),
        $model->name_en

    );
    $header = "Cooperation";

    $name = $model->name_en;
    $desc = $model->desc_en;

 
}else{
    $this->pageTitle=Yii::app()->name . ' - ความร่วมมือ';
    $this->breadcrumbs=array(
        'ความร่วมมือ'=>array('index'),
        $model->name_th
    );
    $header = "ความร่วมมือ";

    $name = $model->name_th;
    $desc = $model->desc_th;

}

?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">
          <?php $this->renderPartial('/cooperation/leftmenu');?>
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
          <h4><?php echo $name;?></h4>
          <div class="wrapper indent-bot">
           <?php echo $desc;?>
          </div>          
      </article>      
    </div>
  </div>
</div>