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
            //$type_name,
            $group
    );
    
    $news_date = 'Date :';
    $news_photo = 'Photos Gallery';
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
            //$type_name,
            $group=>array($action)
        
    );
    $news_date = 'วันที่ข่าว :';
    $news_photo = 'ประมวลภาพ';
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

          <div style="float:right"><?php echo $news_date. ' '. $this->getThaiDate($model->create_date,'dmY');?></div>
          <p><br/><br/></p>

          <div>
              
              <?php if($model->image){?>
              <div align="center">
                  <? if ($model->vdo_link) { ?>
                  <iframe width="600" height="400" src="<?php echo $model->vdo_link;?>?version=3&hl=th_TH" frameborder="0" allowfullscreen></iframe>
                  <? } else { ?>
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $model->image;?>" align="center" />
                  <? } ?>
              </div><br/>
              <div class="clear"></div>
              <?php }?>             
              <?php echo $desc; ?>
          
          </div>
          
          
          
<?php if (count($model_photo)>0){ ?>
          <br/>
          <div>
          <h4><?=$news_photo;?></h4>

            <?php
            Yii::import('ext.jqPrettyPhoto');

            $options = array(
                'slideshow'=>2000,
                'autoplay_slideshow'=>false, 
                'show_title'=>false
            );
            // call addPretty static function
            jqPrettyPhoto::addPretty('.gallery a',jqPrettyPhoto::PRETTY_GALLERY,jqPrettyPhoto::THEME_FACEBOOK, $options);
            ?>

            <p><div class="gallery"><br />
            <?php foreach($model_photo as $photo) { ?>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gallery/<?=$photo->src;?>">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gallery/tn/<?=$photo->tn_src;?>" width="100"/>
            </a>
            <? } ?>    
            </div></p>
          
          </div>
<? } ?>    
          
    </article>      
    </div>
  </div>
</div>
