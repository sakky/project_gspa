<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Gallery';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ภาพกิจกรรม';
    
}
$this->breadcrumbs=array(
	'Gallery',
);

?><!--==============================content================================-->
<div id="page3">
  <div class="main">
    <div class="indent-left">
      <h3>ประมวลภาพกิจกรรม</h3>
      <div class="wrapper margin-bot">
        <?php foreach ($gallery as $row){?>  
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="<?php echo Yii::app()->createUrl('gallery', array('id'=>$row->gallery_id)); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gallery/<?php echo $row->image;?>" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6><?php echo $row->name_th;?></h6>
          <p class="p2"><?php echo $row->desc_th;?></p>
          <a class="button" href="<?php echo Yii::app()->createUrl('gallery', array('id'=>$row->gallery_id)); ?>">ดูเพิ่มเติม</a> </article>
        <?php }?>
        
        
      </div>

    </div>
  </div>
</div>