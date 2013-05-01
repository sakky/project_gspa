<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - About Us';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - เกี่ยวกับเรา';
    
}
$this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('&id=1'),
        $model->name_th

);

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
          <h3>แนะนำวิทยาลัย</h3>
          <h4><?php echo $model->name_th;?></h4>
          <div><?php echo $model->desc_th;?></div>
        </article>
      
    </div>
  </div>
</div>