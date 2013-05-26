<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Teachers';
    $this->breadcrumbs=array(
            'About GSPA'=>array('index', 'id'=>'1'),
            'Teachers'=>array('board'),
            $model->name_en
    );
    $header = "Teachers";
    $position_text = "Position";
    $info_text = "More Detail";
    $name = $model->name_en;
    $position = $model->position_en;
    $detail = $model->detail_en;
}else{
    $this->pageTitle=Yii::app()->name . ' - คณาจารย์';
    $this->breadcrumbs=array(
            'เกี่ยวกับหน่วยงาน'=>array('index', 'id'=>'1'),
            'คณาจารย์'=>array('board'),
            $model->name_th
    );
    $header = "คณาจารย์";
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