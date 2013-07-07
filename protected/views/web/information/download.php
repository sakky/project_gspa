<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Service';
    $this->breadcrumbs=array(
            'Service'=>array('index'),
            'Download Documents',
    );
    $header = "Service :: Download Documents";

}else{
    $this->pageTitle=Yii::app()->name. ' - บริการ';
    $this->breadcrumbs=array(
            'บริการ'=>array('index'),
            'ดาวน์โหลดแบบฟอร์ม',
    );
    $header = "บริการ :: ดาวน์โหลดแบบฟอร์ม";

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
              <li><a href="<?php echo Yii::app()->createUrl('information', array('id'=>$value->doc_id)); ?>"><?php echo $name;?></a></li>
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