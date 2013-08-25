<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Knowledge';
    $this->breadcrumbs=array(
            'Knowledge'=>array('index'),
            $model->name_en
    );
    $header = "Knowledge";

}else{
    $this->pageTitle=Yii::app()->name. ' - การจัดการความรู้';
    if($model->know_group == 1){
        $group = "การจัดการความรู้";
        $url = "group1";
    }else if($model->know_group == 2){
        $group = "หมวดความรู้";
        $url = "group2";
    }else{
        $group = "สารคดี";
        $url = "group3";
    }       
    $this->breadcrumbs=array(
            'การจัดการความรู้'=>array('index'),
            $group=>array($url),
            $model->knowType->name_th=>array('index','type_id'=>$model->know_type_id),          
            $model->name_th
    );
    $header = "การจัดการความรู้";

}
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $model->name_en;
                       $desc = $model->desc_en;
                   }else{
                       $name = $model->name_th;
                       $desc = $model->desc_th;
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
          <h3><?php echo $name;?></h3>
          <div><?php echo $desc;?></div>
      </article>
      
    </div>
  </div>
</div>