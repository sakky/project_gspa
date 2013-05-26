<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - About GSPA';
    $this->breadcrumbs=array(
        'About Us'=>array('index', 'id'=>'1'),
        $model->name_en

    );
    $name = $model->name_en;
    $desc = $model->desc_en;
 
}else{
    $this->pageTitle=Yii::app()->name . ' - เกี่ยวกับหน่วยงาน';
    $this->breadcrumbs=array(
        'เกี่ยวกับหน่วยงาน'=>array('index', 'id'=>'1'),
        $model->name_th

    );
    $name = $model->name_th;
    $desc = $model->desc_th;
}


?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">            
           <?php $this->renderPartial('/about/about_menu');?>
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