<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Cooperation';
    $this->breadcrumbs=array(
            'Cooperation'=>array('index'),
    );
    $header = "Cooperation";

}else{
    $this->pageTitle=Yii::app()->name. ' - ความร่วมมือ';
    $this->breadcrumbs=array(
            'ความร่วมมือ'=>array('index'),
    );
    $header = "ความร่วมมือ";
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
          <ul class="list-4">
              <?php foreach ($model as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
               ?>
              <li><a href="<?php echo Yii::app()->createUrl('cooperation', array('id'=>$value->co_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
        </article>
      
    </div>
  </div>
</div>