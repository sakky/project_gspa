<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Teachers';
    $this->breadcrumbs=array(
            'About GSPA'=>array('index', 'id'=>'1'),
            'Structure Organization'=>array('about/structure'),
    );
    $header = "Structure Organization";
    $position_text = "Position";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name . ' - โครงสร้างหน่วยงาน';
    $this->breadcrumbs=array(
            'เกี่ยวกับหน่วยงาน'=>array('index', 'id'=>'1'),
            'โครงสร้างหน่วยงาน'=>array('about/structure'),
    );
    $header = "โครงสร้างหน่วยงาน";
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
          <p></p>
          <?php foreach ($model as $type){
              
              $str_type_id = $type->str_type_id;
              $Criteria = new CDbCriteria();
              $Criteria->condition = 'status = 1 AND str_type_id ='.$str_type_id;
              $Criteria->order = 'sort_order';
              $str_model = Structure::model()->findAll($Criteria);
              
              
              if (count($str_model)==0) continue;

            ?>              
          <div style="padding:10px 5px 5px 50px;background: #F1F1F1;">
          <?php
              
              foreach ($str_model as $board){
                if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
                    $board_name = $board->name_en;
                    $board_position = $board->position_en;
                    $type = $type->name_en;
                }else{
                    $board_name = $board->name_th;
                    $board_position = $board->position_th;
                    $type = $type->name_th;
                }
          ?>
              

          <h4><?php echo $type;?></h4>
          <div class="wrapper indent-bot">
            <figure class="img-indent">
                <?php if($board->image){?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/structures/<?php echo $board->image;?>" width="100px"/>
                <?php }else{ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no-pic.png" width="100px"/>
                <?php }?>
            </figure>
            <div class="extra-wrap" style="padding-top: 10px">
              <h6><?php echo $board_name;?></h6>
              <p><?php echo $position_text;?> : <?php echo $board_position;?></p>
             </div>
          </div>
          <?php }?>
          
          </div><br/>
          
          <?php }?>
        </article>
      
    </div>
  </div>
</div>