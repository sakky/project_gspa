<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Executive';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ผู้บริหารวิทยาลัยการบริหารรัฐกิจ';
    
}
$this->breadcrumbs=array(
        'เกี่ยวกับเรา'=>array('&id=1'),
	'ผู้บริหารวิทยาลัยการบริหารรัฐกิจ'=>array('executive'),
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
          <h3>ผู้บริหารวิทยาลัยการบริหารรัฐกิจ</h3>
          <?php foreach ($model as $board){?>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/executives/<?php echo $board->image;?>" width="100px"/></figure>
            <div class="extra-wrap" style="padding-top: 20px">
              <h6><?php echo $board->name_th;?></h6>
              <p>ตำแหน่ง : <?php echo $board->position_th;?></p>
              <p class="small"><a href="<?php echo Yii::app()->createUrl('about/executive', array('id'=>$board->exec_id)); ?>">ดูข้อมูลเพิ่มเติม</a></p>
             </div>
          </div>
          <?php }?>
        </article>
      
    </div>
  </div>
</section>
</div>