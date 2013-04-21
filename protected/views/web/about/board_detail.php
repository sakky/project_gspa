<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Board';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - คณะกรรมการประจำวิทยาลัย';
    
}
$this->breadcrumbs=array(
        'About Us'=>array('&id=1'),
	'Board'=>array('board'),
        $model->position_en
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
         
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/boards/<?php echo $model->image;?>"/></figure>
            <div class="extra-wrap">
              <h6><?php echo $model->name_th;?></h6>
              <p>ตำแหน่ง : <?php echo $model->position_th;?>
              <br/>ข้อมูลเพิ่มเติม : <br/><?php echo $model->detail_th;?></p>
             </div>
          </div>
          
        </article>
      
    </div>
  </div>
</section>
</div>