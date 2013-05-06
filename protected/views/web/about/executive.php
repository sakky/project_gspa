<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle=Yii::app()->name . ' - Executive';
    $this->breadcrumbs=array(
            'About Us'=>array('&id=1'),
            'Executive of GSPA'=>array('executive'),
    );
    $header = "Executive of GSPA";
    $position_text = "Position";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name . ' - ผู้บริหารวิทยาลัยการบริหารรัฐกิจ';
    $this->breadcrumbs=array(
            'เกี่ยวกับเรา'=>array('&id=1'),
            'ผู้บริหารวิทยาลัยการบริหารรัฐกิจ'=>array('executive'),
    );
    $header = "ผู้บริหารวิทยาลัยการบริหารรัฐกิจ";
    $position_text = "ตำแหน่ง";
    $readmore = "ดูข้อมูลเพิ่มเติม";
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
          <?php foreach ($model as $board){
              if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                    $name = $board->name_en;
                    $position = $board->position_en;
              }else{
                    $name = $board->name_th;
                    $position = $board->position_th;
              }    
          ?>
          <div class="wrapper indent-bot">
            <figure class="img-indent">
                <?php if($board->image){?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/executives/<?php echo $board->image;?>" width="100px"/>
                <?php }else{ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no-pic.png" width="100px"/>
                <?php }?>
            </figure>
            <div class="extra-wrap" style="padding-top: 10px">
              <h6><?php echo $name;?></h6>
              <p><?php echo $position_text;?> : <?php echo $position;?></p>
              <p class="small"><a href="<?php echo Yii::app()->createUrl('about/executive', array('id'=>$board->exec_id)); ?>"><?php echo $readmore;?></a></p>
             </div>
          </div>
          <?php }?>
        </article>    
    </div>
  </div>
</div>