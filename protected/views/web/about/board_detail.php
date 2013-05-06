<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle=Yii::app()->name . ' - Board';
    $this->breadcrumbs=array(
            'About Us'=>array('&id=1'),
            'Board of directors'=>array('board'),
            $model->name_en
    );
    $header = "Board of directors";
    $position_text = "Position";
    $info_text = "More Detail";
    $name = $model->name_en;
    $position = $model->position_en;
    $detail = $model->detail_en;
}else{
    $this->pageTitle=Yii::app()->name . ' - คณะกรรมการประจำวิทยาลัย';
    $this->breadcrumbs=array(
            'เกี่ยวกับเรา'=>array('&id=1'),
            'คณะกรรมการประจำวิทยาลัย'=>array('board'),
            $model->name_th
    );
    $header = "คณะกรรมการประจำวิทยาลัยการบริหารรัฐกิจ";
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
            <figure class="img-indent">
                <?php if($model->image){?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/boards/<?php echo $model->image;?>" width="100px"/>
                <?php }else{ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no-pic.png" width="100px"/>
                <?php }?>
            </figure>
            <div class="extra-wrap" style="padding-top: 10px">
              <h6><?php echo $name;?></h6>
              <p><?php echo $position_text;?> : <?php echo $position;?>
              <br/><?php echo $info_text;?> : <br/><?php echo $detail;?></p>
             </div>
          </div>
          
        </article>
      
    </div>
  </div>
</div>