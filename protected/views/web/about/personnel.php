<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Personnel';
    $this->breadcrumbs=array(
            'About GSPA'=>array('index', 'id'=>'1'),
            'Personnel'=>array('personnel'),
            $type->name_en
    );
    $header = "Personnel";
    $type_text = "Personnel Type";    
    $position_text = "Position";
    $readmore = "Read More";
    $per_type = $type->name_en;

}else{
    $this->pageTitle=Yii::app()->name . ' - บุคลากร';
    $this->breadcrumbs=array(
            'เกี่ยวกับหน่วยงาน'=>array('index', 'id'=>'1'),
            'บุคลากร'=>array('personnel'),
            $type->name_th
    );
    $header = "บุคลากร";
    $type_text = "ประเภทบุคลากร";
    $position_text = "ตำแหน่ง";
    $readmore = "ดูข้อมูลเพิ่มเติม";
    $per_type = $type->name_th;
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
          <h3><?php echo $header;?> :: <?php echo $per_type;?></h3>
          <?php foreach ($model as $board){
                if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                    $name = $board->name_en;
                    $position = $board->position_en;
                    $personnel_type = $board->personnelType->name_en;
                }else{
                    $name = $board->name_th;
                    $position = $board->position_th;
                    $personnel_type = $board->personnelType->name_th;
                }
          ?>
          <div class="wrapper indent-bot">
            <figure class="img-indent">
                <?php if($board->image){?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/personnel/<?php echo $board->image;?>" width="100px"/>
                <?php }else{ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no-pic.png" width="100px"/>
                <?php }?>
            </figure>
            <div class="extra-wrap" style="padding-top: 10px">
              <h6><?php echo $name;?></h6>
              <p><?php echo $type_text;?> : <?php echo $personnel_type;?><br/>
              <?php echo $position_text;?> : <?php echo $position;?></p>
              <p class="small"><a href="<?php echo Yii::app()->createUrl('about/personnel', array('id'=>$board->personnel_id)); ?>"><?php echo $readmore;?></a></p>
             </div>
          </div>
          <?php }?>
        </article>
      
    </div>
  </div>
</div>