<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - '.$model->name_en;
    $header = $model->name_en;
    $desc = $model->desc_en;
}else{
    $this->pageTitle=Yii::app()->name . ' - '.$model->name_th;
    $header = $model->name_th;
    $desc = $model->desc_th;
}
$this->breadcrumbs=array(
	$header,
);

?><!--==============================content================================-->
<div id="page3">
<section id="content">
  <div class="main">
    
    <div class="wrapper">
        <div style="padding: 0 15px;">
           <div style="margin-bottom: 10px;">
            <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
            <?php endif?>
          </div>
            <h3><?php echo $header;?></h3>
            <?php echo $desc;?>

           <div class="clear"></div>

         </div>

    </div>
  </div>
</section>
</div>