<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Domestic Cooperation';
    $this->breadcrumbs=array(
            'About GSPA'=>array('about/index', 'id'=>'1'),
            'Cooperation'=>array('index'),
            'Domestic',
    );
    $header = "Domestic Cooperation";

}else{
    $this->pageTitle=Yii::app()->name. ' - ความร่วมมือภายในประเทศ';
    $this->breadcrumbs=array(
            'เกี่ยวกับหน่วย'=>array('about/index', 'id'=>'1'),
            'ความร่วมมือ'=>array('index'),
            'ภายในประเทศ',
    );
    $header = "ความร่วมมือภายในประเทศ";
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
              <li><a href="<?php echo Yii::app()->createUrl('cooperation/inbound', array('id'=>$value->co_id)); ?>"><?php echo $name;?></a></li>
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