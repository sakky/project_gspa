<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - News';

    $name = $model->name_en;
    $type = $model->news_type_id;
    if($type == 1){
        $type_name ="GSPA News";
    }
    if($type == 5){
        $type_name ="Media News";
    }
    $group = $model->newsGroup->name_en;
    $desc = $model->desc_en;
    $this->breadcrumbs=array(
            'News & Activities',
            $type_name,
            $group
    );
}else{
    $this->pageTitle=Yii::app()->name. ' - ข่าวสาร';

    $name = $model->name_th;
    $type = $model->news_type_id;
    if($type == 1){
        $type_name ="ภายใน";
    }
    if($type == 5){
        $type_name ="จากสื่อ";
    }
    $group = $model->newsGroup->name_th;
    $desc = $model->desc_th;
    $this->breadcrumbs=array(
            'ประชาสัมพันธ์/กิจกรรม',
            $type_name,
            $group
        
    );
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
          <h4><?php echo $name;?></h4>
          <div>
              
              <?php if($model->image){?>
              <div align="center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $model->image;?>" align="center" />
              </div><br/>
              <div class="clear"></div>
              <?php }?>             
              <?php echo $desc; ?>
          
          </div>
    </article>      
    </div>
  </div>
</div>
