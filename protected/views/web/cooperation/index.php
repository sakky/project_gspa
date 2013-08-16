<?php
$lang = Yii::app()->language; 
$type=CooperationType::model()->findByPk($_GET['type_id']);
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    if($type->group == 'inbound'){
        $group = "Domestic";
    }else{
        $group = "International";
    }
    $this->pageTitle='Graduate School of Public Administration - Cooperation';
    if($_GET['type_id']){
          $this->breadcrumbs=array(
            'About GSPA'=>array('about/index', 'id'=>'1'),
            'Cooperation'=>array('index'),
            $group=>array($type->group),
            $type->name_en,
          );  
    }else{
          $this->breadcrumbs=array(
            'About GSPA'=>array('about/index', 'id'=>'1'),
            'Cooperation',
          );                 
    }

    $header = "Cooperation";

}else{
    $this->pageTitle=Yii::app()->name. ' - ความร่วมมือ';
    if($type->group == 'inbound'){
        $group = "ภายในประเทศ";
    }else{
        $group = "ต่างประเทศ";
    } 
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'เกี่ยวกับหน่วยงาน'=>array('about/index', 'id'=>'1'),
                'ความร่วมมือ'=>array('index'),
                $group=>array($type->group),
                $type->name_th
        );        
    }else{
        $this->breadcrumbs=array(
                'เกี่ยวกับหน่วยงาน'=>array('about/index', 'id'=>'1'),
                'ความร่วมมือ',
        );        
    }

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