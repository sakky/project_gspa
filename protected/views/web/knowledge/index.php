<?php
$action = Yii::app()->getController()->getAction()->controller->action->id;
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Knowledge';
    if($type->know_group == 1){
        $group = "Knowledge Management";
        $url = "group1";
    }else if($type->know_group == 2){
        $group = "Categories of Knowledge";
        $url = "group2";
    }else{
        $group = "Documentary";
        $url = "group3";
    }       
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'Knowledge'=>array('index'),
                $group=>array($url),
                $type->name_en            
        );     
    }else if($action=='group1'){
        $this->breadcrumbs=array(
                'Knowledge'=>array('index'),
                'Knowledge Management',          
        );                 
    }else if($action=='group2'){
        $this->breadcrumbs=array(
                'Knowledge'=>array('index'),
                'Categories of Knowledge',          
        );                 
    }else if($action=='group3'){
        $this->breadcrumbs=array(
                'Knowledge'=>array('index'),
                'Documentary',          
        );                 
    }else{
        $this->breadcrumbs=array(
                'Knowledge',
        );
    }    

    $header = "Knowledge";

}else{
    $this->pageTitle=Yii::app()->name. ' - การจัดการความรู้';
    if($type->know_group == 1){
        $group = "การจัดการความรู้";
        $url = "group1";
    }else if($type->know_group == 2){
        $group = "หมวดความรู้";
        $url = "group2";
    }else{
        $group = "สารคดี";
        $url = "group3";
    }    
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'การจัดการความรู้'=>array('index'),
                $group=>array($url),
                $type->name_th            
        );     
    }else if($action=='group1'){
        $this->breadcrumbs=array(
                'การจัดการความรู้'=>array('index'),
                'การจัดการความรู้',          
        );                 
    }else if($action=='group2'){
        $this->breadcrumbs=array(
                'การจัดการความรู้'=>array('index'),
                'หมวดความรู้',          
        );                 
    }else if($action=='group3'){
        $this->breadcrumbs=array(
                'การจัดการความรู้'=>array('index'),
                'สารคดี',          
        );                 
    }else{
        $this->breadcrumbs=array(
                'การจัดการความรู้',
        );
    }       
    $header = "การจัดการความรู้";

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