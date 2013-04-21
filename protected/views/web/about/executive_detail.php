<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Executive';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ผู้บริหารวิทยาลัยการบริหารรัฐกิจ';
    
}
$this->breadcrumbs=array(
        'About Us'=>array('&id=1'),
	'Executive'=>array('executive'),
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
          <h3>ผู้บริหารวิทยาลัยการบริหารรัฐกิจ</h3>
          <div class="wrapper indent-bot">
            <figure class="img-indent"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/executives/<?php echo $model->image;?>"/></figure>
            <div class="extra-wrap" style="padding-top: 20px">
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