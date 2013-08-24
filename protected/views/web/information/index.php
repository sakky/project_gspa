<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Admission';
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'Admission'=>array('index'),
                $type->name_en            
        );  
        $header = "Admission :: ". $type->name_th ;
    }else{
        $this->breadcrumbs=array(
                'Admission',
        );
         $header = "Admission";
    }           

}else{
    $this->pageTitle=Yii::app()->name. ' - สมัครเรียน';
    if($_GET['type_id']){
        $this->breadcrumbs=array(
                'สมัครเรียน'=>array('index'),
                $type->name_th            
        );
        $header = "สมัครเรียน :: ". $type->name_th ;
    }else{
        $this->breadcrumbs=array(
                'สมัครเรียน',
        );
        $header = "สมัครเรียน";
    }
    

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