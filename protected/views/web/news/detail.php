<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - News';
    $this->breadcrumbs=array(
            'News'=>array('index'),
            $model->name_en
    );
    $info_text = "Download More Info.";
    $name = $model->name_en;
    $pdf = $model->pdf_en;
    $desc = $model->desc_en;
}else{
    $this->pageTitle=Yii::app()->name. ' - ข่าวสาร';
    $this->breadcrumbs=array(
            'ข่าวสาร'=>array('index'),
            $model->name_th
    );
    $info_text = "ดาวน์โหลดรายละเอียด";
    $name = $model->name_en;
    $pdf = $model->pdf_en;
    $desc = $model->desc_th;
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
              
              <?php if($model->image && $model->news_type_id==1){?>
              <div align="center">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/<?php echo $model->image;?>" align="center" />
              </div><br/>
              <div class="clear"></div>
              <?php }?>             
              <?php echo $desc; ?>
          
          </div>
          <?php if($pdf){?>
          <br/>
          <div align="right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/pdf.png"/> <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/news/pdf/<?php echo $pdf;?>"><?php echo $info_text;?></a></div>
          <?php }?>
    </article>      
    </div>
  </div>
</div>
