<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Knowledge';
    $this->breadcrumbs=array(
            'Knowledge',
    );
    $header = "Knowledge";

}else{
    $this->pageTitle=Yii::app()->name. ' - คลังข้อมูลความรู้';
    $this->breadcrumbs=array(
            'คลังข้อมูลความรู้',
    );
    $header = "คลังข้อมูลความรู้";

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
          <ul class="list-4">
              <?php foreach ($model as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
               ?>
              <li><a href="<?php echo Yii::app()->createUrl('knowledge', array('id'=>$value->know_id)); ?>"><?php echo $name;?></a></li>
              <?php }?>
          </ul>
        </article>
      
    </div>
  </div>
</div>