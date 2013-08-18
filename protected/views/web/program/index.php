<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Programs';
    $this->breadcrumbs=array(
        'Programs',

    );
    $header = "Programs";



 
}else{
    $this->pageTitle=Yii::app()->name . ' - หลักสูตรที่เปิดสอน';
    $this->breadcrumbs=array(
        'หลักสูตรที่เปิดสอน',
    );
    $header = "หลักสูตรที่เปิดสอน";



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
          <div><img class="border-banner" src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/programs-banner.jpg"/></div>
          <h3>หลักสูตรปริญญาโท</h3>
            <ul class="list-4">
                <?php foreach ($master as $value){?>
                    <li><a href="<?php echo Yii::app()->createUrl('program', array('id'=>$value->program_id)); ?>"><?php echo $value->name_th;?></a></li>
                <?php }?>
            </ul>
          
          <h3>หลักสูตรปริญญาเอก</h3>
             <ul class="list-4">
                <?php foreach ($doctor as $value2){?>
                    <li><a href="<?php echo Yii::app()->createUrl('program', array('id'=>$value->program_id)); ?>"><?php echo $value2->name_th;?></a></li>
                <?php }?>
             </ul>
        </article>
      
    </div>
  </div>
</div>