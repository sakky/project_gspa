<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Board';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - คณะกรรมการประจำวิทยาลัย';
    
}
$this->breadcrumbs=array(
        'About Us'=>array('&id=1'),
        'Board'=>array('board'),
);

?>
<div id="page6">
<section id="content" style="margin-top: -20px">
  <div class="main">
    <div class="wrapper">
      <article class="col-1">
        <div class="indent-left">            
           <?php $this->renderPartial('/about/about_menu');?>
        </div>
      </article>
      <article class="col-2">
          <h3>คณะกรรมการประจำวิทยาลัยการบริหารรัฐกิจ</h3>
          <?php foreach ($model as $board){?>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/boards/<?php echo $board->image;?>" width="100px"/></figure>
            <div class="extra-wrap" style="padding-top: 20px">
              <h6><?php echo $board->name_th;?></h6>
              <p>ตำแหน่ง : <?php echo $board->position_th;?></p>
              <p class="small"><a href="<?php echo Yii::app()->createUrl('about/board', array('id'=>$board->board_id)); ?>">ดูข้อมูลเพิ่มเติม</a></p>
             </div>
          </div>
          <?php }?>
        </article>
      
    </div>
  </div>
</section>
</div>