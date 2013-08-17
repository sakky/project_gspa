<?php
$lang = Yii::app()->language; 
if($lang == 'en' || $lang == 'EN'|| $lang == 'En'){
    $this->pageTitle='Graduate School of Public Administration - Board of directors';
    $this->breadcrumbs=array(
            'About GSPA'=>array('index', 'id'=>'1'),
            'Board of directors'=>array('board'),
    );
    $header = "Board of directors";
    $position_text = "Position";
    $readmore = "Read More";
}else{
    $this->pageTitle=Yii::app()->name . ' - คณะกรรมการ';
    $this->breadcrumbs=array(
            'เกี่ยวกับหน่วยงาน'=>array('index', 'id'=>'1'),
            'คณะกรรมการ'=>array('board'),
    );
    $header = "คณะกรรมการ";
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
                    $board_name = $board->name_en;
                    $board_position = $board->position_en;
                }else{
                    $board_name = $board->name_th;
                    $board_position = $board->position_th;
                }
          ?>
          <div class="wrapper indent-bot">
            <figure class="img-indent">
                <?php if($board->image){?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/boards/<?php echo $board->image;?>" width="100px"/>
                <?php }else{ ?>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/front/no-pic.png" width="100px"/>
                <?php }?>
            </figure>
            <div class="extra-wrap" style="padding-top: 10px">
              <h6><?php echo $board_name;?></h6>
              <p><?php echo $position_text;?> : <?php echo $board_position;?></p>
              <p class="small"><a href="<?php echo Yii::app()->createUrl('about/board', array('id'=>$board->board_id)); ?>"><?php echo $readmore;?></a></p>
             </div>
          </div>
          <?php }?>
          <?php $this->widget('CLinkPager', array(
                'currentPage'=>$pages->getCurrentPage(),
                'pages' => $pages,
                'maxButtonCount'=>5,
                'htmlOptions'=>array('class'=>'pagenav'),
                'header'=> '',
          )) ?>  
        </article>
      
    </div>
  </div>
</div>