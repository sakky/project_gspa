<?php
$action = Yii::app()->getController()->getAction()->controller->action->id;
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Service for Student';
    if($_GET['type_id']){
            $this->breadcrumbs=array(
                    'Service for Student'=>array('index'),
                    $type->serGroup->ser_name_en=>array('index','group'=>$type->ser_group),
                    $type->name_en            
            );    
    }else if($_GET['group']){
        $this->breadcrumbs=array(
                'Service for Student'=>array('index'),
                $group->ser_name_en,          
        );                                
    }else{
        $this->breadcrumbs=array(
                'Service for Student',
        );
    }    
    $header = "Service for Student".($group->ser_name_en?' :: '.$group->ser_name_en:'').($type->name_en?' :: '.$type->name_en:'');

}else{
    $this->pageTitle=Yii::app()->name. ' - บริการนิสิต';
    if($_GET['type_id']){
            $this->breadcrumbs=array(
                    'บริการนิสิต'=>array('index'),
                    $type->serGroup->ser_name=>array('index','group'=>$type->ser_group),
                    $type->name_th            
            );    
    }else if($_GET['group']){
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                $group->ser_name,          
        );                                
    }else{
        $this->breadcrumbs=array(
                'บริการนิสิต',
        );
    }   
           
    $header = "บริการนิสิต".($group->ser_name?' :: '.$group->ser_name:'').($type->name_th?' :: '.$type->name_th:'');

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

          <div><img class="border-banner" src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/student-banner.jpg"/></div>
          
          <h3><?php echo $header;?></h3>
          <ul class="list-4">
              <?php foreach ($model as $value){
                   if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                       $name = $value->name_en;
                   }else{
                       $name = $value->name_th;
                   }
               ?>
              <li><a href="<?php echo Yii::app()->createUrl('student', array('id'=>$value->ser_id)); ?>"><?php echo $name;?></a></li>
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