<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle=Yii::app()->name . ' - Executive';
    $this->breadcrumbs=array(
            'About Us'=>array('&id=1'),
            'Executive of GSPA'=>array('executive'),
            $model->name_th
    );
    $header = "Executive of GSPA";
    $position_text = "Position";
    $info_text = "More Detail";
    $name = $model->name_en;
    $position = $model->position_en;
    $detail = $model->detail_en;
}else{
    $this->pageTitle=Yii::app()->name . ' - ผู้บริหารวิทยาลัยการบริหารรัฐกิจ';
    $this->breadcrumbs=array(
            'เกี่ยวกับเรา'=>array('&id=1'),
            'ผู้บริหารวิทยาลัยการบริหารรัฐกิจ'=>array('executive'),
            $model->name_th
    );
    $header = "ผู้บริหารวิทยาลัยการบริหารรัฐกิจ";
    $position_text = "ตำแหน่ง";
    $info_text = "ข้อมูลเพิ่มเติม";
    $name = $model->name_th;
    $position = $model->position_th;
    $detail = $model->detail_th;
}



?>
<div id="page6">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">            
           <?php $this->renderPartial('/about/about_menu');?>
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
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/executives/<?php echo $model->image;?>" width="100px"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $name;?></h6>
              <p><?php echo $position_text;?> : <?php echo $position;?>
              <br/><?php echo $info_text;?> : <br/><?php echo $detail;?></p>
            </div>
          </div>
        </article>
      
    </div>
  </div>
</div>