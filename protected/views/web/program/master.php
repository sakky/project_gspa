<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Master\'s Degree Programs';
    $this->breadcrumbs=array(
        'Programs'=>array('index'),
        'Master\'s Degree Programs',

    );
    $header = "Master's Degree Programs";



 
}else{
    $this->pageTitle=Yii::app()->name . ' - หลักสูตรปริญญาโท';
    $this->breadcrumbs=array(
        'หลักสูตรที่เปิดสอน'=>array('index'),
        'หลักสูตรปริญญาโท',
    );
    $header = "หลักสูตรปริญญาโท";



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
          <h3><?php echo $header;?></h3>
            <ul class="list-4">
                <?php foreach ($model as $value){?>
                    <li><a href="<?php echo Yii::app()->createUrl('program/master', array('id'=>$value->program_id)); ?>"><?php echo $value->name_th;?></a></li>
                <?php }?>
            </ul>
            <?php $this->widget('CLinkPager', array(
                    'currentPage'=>$pages->getCurrentPage(),
                    'pages' => $pages,
                    'maxButtonCount'=>5,
                    'htmlOptions'=>array('class'=>'pagenav'),
                    'header'=> '',
            )) ?>
        </article>
      
    </div>
  </div>
</div>