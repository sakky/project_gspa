<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Cooperation';
    if($model->group == 'inbound'){
        $group = "Domestic";
    }else{
        $group = "International";
    }
    $this->breadcrumbs=array(
        'About GSPA'=>array('about/index', 'id'=>'1'),
        'Cooperation'=>array('index'),
        $group=>array($model->group),
        $model->coType->name_en=>array('index','type_id'=>$model->co_type_id),

    );
    $header = "Cooperation";

    $name = $model->name_en;
    $desc = $model->desc_en;

 
}else{
    $this->pageTitle=Yii::app()->name . ' - ความร่วมมือ';
    if($model->group == 'inbound'){
        $group = "ภายในประเทศ";
    }else{
        $group = "ต่างประเทศ";
    }
    $this->breadcrumbs=array(
        'เกี่ยวกับหน่วย'=>array('about/index', 'id'=>'1'),
        'ความร่วมมือ'=>array('index'),
        $group=>array($model->group),
        $model->coType->name_th=>array('index','type_id'=>$model->co_type_id),
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