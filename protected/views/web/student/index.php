<?php
$action = Yii::app()->getController()->getAction()->controller->action->id;
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Service for Student';
    if($type->ser_group == 1){
        $group = "Master's degree";
        $url = "group1";
    }else if($type->ser_group == 2){
        $group = "Doctorate Degree";
        $url = "group2";
    }else if($type->ser_group == 3){
        $group = "Evaluation of Teaching";
        $url = "group3";
    }
    if($_GET['type_id']){
        if($type->ser_group ==4){
            $this->breadcrumbs=array(
                    'Service for Student'=>array('index'),
                    $type->name_en            
            );  
        }else{
            $this->breadcrumbs=array(
                    'Service for Student'=>array('index'),
                    $group=>array($url),
                    $type->name_en            
            );  
        }    
    }else if($action=='group1'){
        $this->breadcrumbs=array(
                'Service for Student'=>array('index'),
                'Master\'s degree',          
        );                 
    }else if($action=='group2'){
        $this->breadcrumbs=array(
                'Service for Student'=>array('index'),
                'Doctorate Degree',          
        );                 
    }else if($action=='group3'){
        $this->breadcrumbs=array(
                'Service for Student'=>array('index'),
                'Evaluation of Teaching',          
        );                 
    }else if($type->ser_group == 3){
        $this->breadcrumbs=array(
                'Service for Student',
        );
    }    
    $header = "Service for Student";

}else{
    $this->pageTitle=Yii::app()->name. ' - บริการนิสิต';
    
    if($type->ser_group == 1){
        $group = "ปริญญาโท";
        $url = "group1";
    }else if($type->ser_group == 2){
        $group = "ปริญญาเอก";
        $url = "group2";
    }else if($type->ser_group == 3){
        $group = "ประเมินการเรียนการสอน";
        $url = "group3";
    }
    
    if($_GET['type_id']){
       if($type->ser_group ==4){
            $this->breadcrumbs=array(
                    'บริการนิสิต'=>array('index'),
                    $type->name_th            
            ); 
        }else{
            $this->breadcrumbs=array(
                    'บริการนิสิต'=>array('index'),
                    $group=>array($url),
                    $type->name_th            
            );  
        }   
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                $group=>array($url),
                $type->name_th            
        );     
    }else if($action=='group1'){
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                'ปริญญาโท',          
        );                 
    }else if($action=='group2'){
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                'ปริญญาเอก',          
        );                 
    }else if($action=='group3'){
        $this->breadcrumbs=array(
                'บริการนิสิต'=>array('index'),
                'ประเมินการเรียนการสอน',          
        );                 
    }else{
        $this->breadcrumbs=array(
                'บริการนิสิต',
        );
    }        
    $header = "บริการนิสิต";

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

          <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/student.png"/></div>
          
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