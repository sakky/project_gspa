<?php
/* @var $this NewsController */
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - News';
    $this->breadcrumbs=array(
            'News'=>array('index'),
            $model->name_en
    );
    $info_text = "Read More";
    $readmore = "Back to News All";
    $name = $model->name_en;
    $pdf = $model->pdf_en;
    $desc = $model->desc_en;
}else{
    $this->pageTitle=Yii::app()->name. ' - ข่าวสาร';
    $this->breadcrumbs=array(
            'ข่าวสาร'=>array('index'),
            $model->name_th
    );
    $info_text = "ดูรายละเอียด";
    $readmore = "ย้อนกลับหน้าข่าวรวม";
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
          <div><?php echo $desc;?></div>
          <?php if($pdf){?>
          <div align="right"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/pdf.png"/> <a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/programs/<?php echo $pdf;?>"><?php echo $info_text;?></a></div>
          <?php }?>
          <br/>
          <div align="right"><a href="<?php echo Yii::app()->createUrl('news'); ?>"><h6><?php echo $readmore;?></h6></a></div>
      </article>      
    </div>
  </div>
</div>
